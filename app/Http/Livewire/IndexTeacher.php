<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class IndexTeacher extends Component
{
    public $acakanKe;
    public $toggleTable;
    public $resultData;

    public function render()
    {
        $allAcakanObj = DB::table('group')
            ->select('acakan_ke')
            ->orderBy('acakan_ke', 'asc')
            ->distinct()
            ->get();
        $allAcakan = $this->objectToArray($allAcakanObj);

        return view('livewire.index-teacher', compact(['allAcakan']));
    }

    public function updatedAcakanKe($acakan_ke)
    {
        if (!empty($acakan_ke)) {
            $this->toggleTable = true;
            $this->resultData = $this->perhitunganMSF($acakan_ke);
        } else {
            $this->toggleTable = false;
        }
    }

    protected function perhitunganMSF($acakan_ke)
    {
        $BOBOT_DIRI_SENDIRI = 1;
        $BOBOT_SISWA_LAIN = 2;
        $BOBOT_GURU = 3;
        $TOTAL_BOBOT = $BOBOT_DIRI_SENDIRI + $BOBOT_SISWA_LAIN + $BOBOT_GURU;
        $SKALA_NILAI = 10;
        $MAX_NILAI_PERTANYAAN = 10;
        $JUMLAH_PERTANYAAN = DB::table('question')->count();
        $MAX_NILAI_PER_PERTANYAAN = $JUMLAH_PERTANYAAN * $MAX_NILAI_PERTANYAAN;

        $data = $this->diff_filled_and_not_filled_group($acakan_ke);

        // Perhitungan Diri Sendiri dan Siswa Lain
        $allIDFilled = [];
        foreach ($data['students_filled_group'] as $item) {
            $allIDFilled[] = $item['user_id'];
        }
        sort($allIDFilled);

        $result_diri_sendiri = [];
        $result_siswa = [];
        $result_guru = [];
        foreach ($allIDFilled as $item) {

            // Rumus Perhitungan MSF Diri Sendiri
            $gradeSelf = DB::table('grade')
                ->join('users', 'grade.dinilai', '=', 'users.id')
                ->select(DB::raw('SUM(grade) AS total_nilai, nama, nip_nis'))
                ->where('acakan_ke', '=', $acakan_ke)
                ->where('dinilai', '=', $item)
                ->where('penilai', '=', $item)
                ->get();

            $resultMSFSelf = ($gradeSelf[0]->total_nilai / $MAX_NILAI_PER_PERTANYAAN) * $BOBOT_DIRI_SENDIRI;

            $result_diri_sendiri[] = ['user_id' => $item, 'hasil_nilai_diri_sendiri' => $resultMSFSelf, 'nama' => $gradeSelf[0]->nama, 'nis' => $gradeSelf[0]->nip_nis];

            // Rumus Perhitungan MSF Siswa Lain
            $peoplePerGroupExpectSelf = DB::table('grade')
                ->select('dinilai')
                ->where('penilai', '=', $item)
                ->where('dinilai', '!=', $item)
                ->where('acakan_ke', '=', $acakan_ke)
                ->distinct()
                ->get();

            $gradeAnotherStudent = DB::table('grade')
                ->select(DB::raw('SUM(grade) AS total_nilai, dinilai'))
                ->where('acakan_ke', '=', $acakan_ke)
                ->where('penilai', '!=', $item)
                ->where('dinilai', '=', $item)
                ->groupBy('dinilai')
                ->get();

            $resultFromAnotherStudent = (($gradeAnotherStudent[0]->total_nilai / count($peoplePerGroupExpectSelf)) / $MAX_NILAI_PER_PERTANYAAN) * $BOBOT_SISWA_LAIN;
            $result_siswa[] = ['user_id' =>  $item, 'hasil_penilaian_siswa_lain' => $resultFromAnotherStudent];
        }

        // Rumus Perhitungan MSF Guru
        $gradeTeacher = DB::table('grade_teacher')
            ->where('acakan_ke', '=', $acakan_ke)
            ->orderBy('siswa')
            ->get();

        $idFromGradeTeacher = [];
        $idFilledStudents = [];
        foreach ($gradeTeacher as $item) {
            $idFromGradeTeacher[] = $item->siswa;
        }

        foreach ($result_siswa as $item) {
            $idFilledStudents[] = $item['user_id'];
        }

        $resultIDTeacherNotFilled = array_udiff($idFilledStudents, $idFromGradeTeacher, array($this, "functionComparing"));
        $resultIDCanProcessMSF = [];

        foreach ($idFilledStudents as $item) {
            if (!in_array($item, $resultIDTeacherNotFilled)) {
                $resultIDCanProcessMSF[] = $item;
            }
        }

        // Looping Perhitungan yang Sudah Diinput Guru
        foreach ($resultIDCanProcessMSF as $item) {
            $gradeTeacher = DB::table('grade_teacher')
                ->where('acakan_ke', '=', $acakan_ke)
                ->where('siswa', '=', $item)
                ->get();

            $resultMSFTeacher = ($gradeTeacher[0]->grade / $MAX_NILAI_PERTANYAAN) * $BOBOT_GURU;
            $result_guru[] = ['user_id' =>  $item, 'hasil_penilaian_dari_guru' => $resultMSFTeacher];
        }

        // Looping Siswa yang Belum Diinput Guru
        foreach ($resultIDTeacherNotFilled as $item) {
            $result_guru[] = ['user_id' => $item, 'is_not_filled_guru' => true];
        }

        $resultFinalMSF = [];

        // Final Perhitungan MSF
        foreach ($resultIDCanProcessMSF as $item) {
            $self = array_search($item, array_column($result_diri_sendiri, 'user_id'));
            $student = array_search($item, array_column($result_siswa, 'user_id'));
            $teacher = array_search($item, array_column($result_guru, 'user_id'));

            $selfValue = $result_diri_sendiri[$self];
            $studentValue = $result_siswa[$student];
            $teacherValue = $result_guru[$teacher];

            $finalGrade = number_format(($selfValue['hasil_nilai_diri_sendiri'] + $studentValue['hasil_penilaian_siswa_lain'] + $teacherValue['hasil_penilaian_dari_guru']) * $SKALA_NILAI / $TOTAL_BOBOT, 2, '.', '');

            $gradeAlphabet = $this->grade_alphabet($finalGrade, $SKALA_NILAI);
            $resultFinalMSF[] = ['user_id' => $item, 'grade_alphabet' => $gradeAlphabet, 'score' => $finalGrade, 'skala_nilai' => $SKALA_NILAI, 'nama' => $selfValue['nama'], 'nis' => $selfValue['nis']];
        }

        // Gabung Array Result MSF dengan Data Siswa Yang Guru Belum Nginput Nilai
        $studentNotFilledByTeacher = [];
        foreach ($resultIDTeacherNotFilled as $item) {
            $user = DB::table('users')
                ->where('id', '=', $item)
                ->get();

            $studentNotFilledByTeacher[] = ['user_id' => $item, 'is_not_filled_guru' => true, 'nama' => $user[0]->nama, 'nis' => $user[0]->nip_nis];
        }
        $x = array_merge($resultFinalMSF, $studentNotFilledByTeacher);

        // Gabung Array Hasil Sebelumnya dengan Siswa yang kelompoknya ada yang belum mengisi
        $y = [];
        foreach ($data['students_not_filled_group'] as $item) {
            $user = DB::table('users')
                ->where('id', '=', $item['user_id'])
                ->get();
            $y[] = [
                'nama_kelompok' => $item['nama_kelompok'], 'user_id' => $item['user_id'], 'is_mengisi' => $item['is_mengisi'], 'nama' => $user[0]->nama, 'nis' => $user[0]->nip_nis
            ];
        }
        $result = array_merge($x, $y);

        // Urutkan Berdasarkan User ID
        $resultSorting = array_column($result, 'user_id');
        array_multisort($resultSorting, SORT_ASC, $result);

        return $result;
    }

    // Fungsi yang Mengubah Object ke Array
    // Harus diubah ke Array karane Javascript Tidak Bisa Menerima Object Dari Query Database
    // Masalah Umum Ketika Menggunakan Livewire
    protected function objectToArray($object)
    {
        $array = json_decode(json_encode($object), true);

        return $array;
    }

    protected function functionComparing($a, $b)
    {
        if ($a === $b) {
            return 0;
        }

        return ($a > $b) ? 1 : -1;
    }

    protected function diff_filled_and_not_filled_group($acakan_ke)
    {
        // Ambil Semua Data Siswa Dari Tabel Group Berdasarkan Acakan Ke Berapa
        // Datanya Nanti Akan Dikelompokkan Per Group Untuk Dilooping
        // Sepertinya Bisa Untuk Menilai Perhitungan Dari Siswa Sendiri dan Siswa Lain (Bobot 1 dan 2)

        $daftarSemuaGroupBerdasarkanAcakan = DB::table('group')
            ->select('nama_group')
            ->where('acakan_ke', '=', $acakan_ke)
            ->orderBy('nama_group')
            ->distinct()
            ->get();

        $pengelompokkanOrangPerGroup = [];

        for ($i = 0; $i < count($daftarSemuaGroupBerdasarkanAcakan); $i++) {
            $orangPerGroup = DB::table('group')
                ->select('user_id', 'nama_group')
                ->where('acakan_ke', '=', $acakan_ke)
                ->where('nama_group', '=', $daftarSemuaGroupBerdasarkanAcakan[$i]->nama_group)
                ->orderBy('user_id')
                ->get();

            $allPeople = [];

            foreach ($orangPerGroup as $item) {
                $allPeople[] = $item->user_id;
            }

            $pengelompokkanOrangPerGroup[] = ['nama_kelompok' => $orangPerGroup[0]->nama_group, 'siswa' => $allPeople];
        }

        // Setelah Mendapatkan Semua User Per Group
        // Untuk Olah Grade Dibutuhkan User Penilai dan Dinilai untuk dibandingkan
        // Looping Semua Pengelompokkan Group Untuk Dicari Apakah Sudah Mengisi Atau Belum
        // Kalau Sudah Lanjut Perhitungan, Kalau Belum Gagalkan (Kalau Gagal Seharusnya Guru Tidak Bisa Menilai)

        // Mencari User yang Sudah Mengisi Semua dan Belum
        $dataKelompokOlahan = [];
        for ($i = 0; $i < count($pengelompokkanOrangPerGroup); $i++) {
            for ($j = 0; $j < count($pengelompokkanOrangPerGroup[$i]['siswa']); $j++) {
                // Mengubah Semua Data Array Menjadi True / False Berdasarkan Orang Yang Sudah Mengisi Atau Belum
                $semuaSiswaTabelGradePerKelompok = DB::table('grade')
                    ->select('dinilai')
                    ->where('penilai', '=', $pengelompokkanOrangPerGroup[$i]['siswa'][$j])
                    ->where('acakan_ke', '=', $acakan_ke)
                    ->distinct()
                    ->get();

                $idSemua = [];
                foreach ($semuaSiswaTabelGradePerKelompok as $item) {
                    $idSemua[] = $item->dinilai;
                }

                $tidakTerisi = array_udiff($pengelompokkanOrangPerGroup[$i]['siswa'], $idSemua, array($this, 'functionComparing'));

                if (count($tidakTerisi) != 0) {
                    $dataKelompokOlahan[] = [
                        'nama_kelompok' => $pengelompokkanOrangPerGroup[$i]['nama_kelompok'],
                        'user_id' => $pengelompokkanOrangPerGroup[$i]['siswa'][$j],
                        'is_mengisi' => false
                    ];
                } else {
                    $dataKelompokOlahan[] = [
                        'nama_kelompok' => $pengelompokkanOrangPerGroup[$i]['nama_kelompok'],
                        'user_id' => $pengelompokkanOrangPerGroup[$i]['siswa'][$j],
                        'is_mengisi' => true
                    ];
                }
            }
        }

        // Mencari Daftar Kelompok yang Ada Anggotanya Yang Belum Mengisi Semua
        $daftarKelompokBelumMengisiSemua = [];
        $orangBelumMengisi = array_keys(array_column($dataKelompokOlahan, 'is_mengisi'), false);
        foreach ($orangBelumMengisi as $item) {
            $daftarKelompokBelumMengisiSemua[] = $dataKelompokOlahan[$item]['nama_kelompok'];
        }
        $uniqueKelompok = array_unique($daftarKelompokBelumMengisiSemua);

        // Memisahkan Kelompok yang anggotanya sudah mengisi semua dan belum mengisi semua
        $daftarAnggotaKelompokBelumMengisi = [];
        foreach ($uniqueKelompok as $item) {
            $students = array_keys(array_column($dataKelompokOlahan, 'nama_kelompok'), $item);
            foreach ($students as $x) {
                $daftarAnggotaKelompokBelumMengisi[] = $x;
            }
        }

        $allFilledGroup = [];
        $notFilledGroup = [];

        for ($i = 0; $i < count($dataKelompokOlahan); $i++) {
            if (in_array($i, $daftarAnggotaKelompokBelumMengisi, TRUE)) {
                $notFilledGroup[] = $dataKelompokOlahan[$i];
            } else {
                $allFilledGroup[] = $dataKelompokOlahan[$i];
            }
        }

        return [
            'students_filled_group' => $allFilledGroup,
            'students_not_filled_group' => $notFilledGroup,
            'group_not_filled' => $uniqueKelompok
        ];
    }

    // Fungsi Mengubah Skor Menjadi Nilai Alphabet
    protected function grade_alphabet($gradeValue, $skalaNilai)
    {
        $A = 7 / 7;
        $A_B = 6 / 7;
        $B = 5 / 7;
        $B_C = 4 / 7;
        $C = 3 / 7;
        $C_D = 2 / 7;
        $D = 1 / 7;

        if ($gradeValue >= $A * $skalaNilai) {
            return 'A';
        } else if ($gradeValue >= $A_B * $skalaNilai) {
            return 'A/B';
        } else if ($gradeValue >= $B * $skalaNilai) {
            return 'B';
        } else if ($gradeValue >= $B_C * $skalaNilai) {
            return 'B/C';
        } else if ($gradeValue >= $C * $skalaNilai) {
            return 'C';
        } else if ($gradeValue >= $C_D * $skalaNilai) {
            return 'C/D';
        } else if ($gradeValue >= $D * $skalaNilai) {
            return 'D';
        }
    }
}
