<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GradeTeacher extends Component
{
    public $acakanKe;
    public $toggleForm;
    public $studentFilled;
    public $toggleTable;
    public $toggleGroup;
    public $studentNotFilled;
    public $studentCurrentTable;
    public $dataGroupCantFilled;

    public function render()
    {
        $allAcakanObj = DB::table('group')
            ->select('acakan_ke')
            ->orderBy('acakan_ke', 'asc')
            ->distinct()
            ->get();
        $allAcakan = $this->objectToArray($allAcakanObj);

        return view('livewire.grade-teacher', compact(['allAcakan']));
    }

    public function updatedAcakanKe($acakan_ke)
    {
        if (!empty($acakan_ke)) {
            $this->toggleForm = true;
            $this->toggleTable = true;
            $this->studentFilled = $this->studentFilledFunction($acakan_ke);
            $this->studentNotFilled = $this->studentNotFilledFunction($acakan_ke);
            $this->studentCurrentTable = $this->studentNotFilledFunction($acakan_ke);
        } else {
            $this->toggleForm = false;
            $this->toggleTable = false;
            $this->toggleGroup = false;
        }
    }

    public function showStudentFilled($acakan_ke)
    {
        $this->toggleTable = true;
        $this->toggleGroup = false;
        $this->studentCurrentTable = $this->studentFilledFunction($acakan_ke);
    }

    public function showStudentNotFilled($acakan_ke)
    {
        $this->toggleTable = true;
        $this->toggleGroup = false;
        $this->studentCurrentTable = $this->studentNotFilledFunction($acakan_ke);
    }

    public function showGroupCantFilled($acakan_ke)
    {
        $this->toggleTable = false;
        $this->toggleGroup = true;
        $this->dataGroupCantFilled = $this->groupCantFilledFunction($acakan_ke);
    }

    protected function studentFilledFunction($acakan_ke)
    {
        $studentFilledDB = DB::table('grade_teacher')
            ->join('users', 'grade_teacher.siswa', '=', 'users.id')
            ->select('nama', 'nip_nis', 'siswa')
            ->where('acakan_ke', '=', $acakan_ke)
            ->orderBy('siswa')
            ->get();

        $studentFilled = $this->objectToArray($studentFilledDB);

        return $studentFilled;
    }

    protected function studentNotFilledFunction($acakan_ke)
    {
        $data = $this->diff_filled_and_not_filled_group($acakan_ke)['group_not_filled'];

        $studentNotFilledDB = DB::table('group')
            ->join('users', 'group.user_id', '=', 'users.id')
            ->select('nama', 'nip_nis', 'user_id', 'acakan_ke')
            ->where('acakan_ke', '=', $acakan_ke)
            ->whereNotIn('nama_group', $data)
            ->orderBy('user_id')
            ->get();

        $studentNotFilled = $this->objectToArray($studentNotFilledDB);

        $result = [];
        $currentStudentFilled = $this->studentFilledFunction($acakan_ke);
        $id = [];

        foreach ($currentStudentFilled as $item) {
            $id[] = $item['siswa'];
        }

        foreach ($studentNotFilled as $item) {
            if (!in_array($item['user_id'], $id, true)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    protected function groupCantFilledFunction($acakan_ke)
    {
        $data = $this->diff_filled_and_not_filled_group($acakan_ke)['group_not_filled'];

        $result = [];
        foreach ($data as $item) {
            $db = DB::table('group')
                ->join('users', 'group.user_id', '=', 'users.id')
                ->select('user_id', 'nama', 'nip_nis')
                ->where('nama_group', '=', $item)
                ->where('acakan_ke', '=', $acakan_ke)
                ->get();
            $dbArray = $this->objectToArray($db);

            $result[] = ['nama_kelompok' => $item, 'siswa' => $dbArray];
        }

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
}
