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
            dd($this->process_grade_all_students($acakan_ke));
        } else {
            $this->toggleTable = false;
        }
    }

    protected function process_grade_all_students($acakan_ke)
    {
        // Ambil Semua Data Siswa Dari Tabel Group Berdasarkan Acakan Ke Berapa
        // 

        // $BOBOT_DIRI_SENDIRI = 1;
        // $BOBOT_SISWA_LAIN = 2;
        // $BOBOT_GURU = 3;
        // $MAX_NILAI_PERTANYAAN = 10;
        // $JUMLAH_PERTANYAAN = DB::table('question')->count();
        // $MAX_NILAI_PER_PERTANYAAN = $JUMLAH_PERTANYAAN * $MAX_NILAI_PERTANYAAN;


        // $result_diri_sendiri = [];
        // $result_siswa = [];
        // $result_guru = [];

        // // Logic Perhitungan Diri Sendiri
        // $all_grade_from_self = DB::table('grade')
        //     ->select(DB::raw('COUNT(grade) AS total_nilai, dinilai'))
        //     ->where('acakan_ke', '=', $acakan_ke)
        //     ->orderBy('dinilai', 'asc')
        //     ->groupBy('dinilai')
        //     ->get();

        // foreach ($all_grade_from_self as $item) {
        //     $result_diri_sendiri[] = ($item->total_nilai / $MAX_NILAI_PER_PERTANYAAN) * $BOBOT_DIRI_SENDIRI;
        // }

        // // Logic Perhitungan Siswa Lain Selain Diri Sendiri
        // $semuaGroupPerAcakanKe = DB::table('group')
        //     ->select('nama_group')
        //     ->distinct()
        //     ->where('acakan_ke', '=', $acakan_ke)
        //     ->orderBy('nama_group')
        //     ->get();

        // $data = [];
        // $allPeopleInGroup = [];

        // for ($i = 0; $i < count($semuaGroupPerAcakanKe); $i++) {
        //     $orangPerGroup = DB::table('group')
        //         ->select('user_id', 'nama_group')
        //         ->where('acakan_ke', '=', $acakan_ke)
        //         ->where('nama_group', '=', $semuaGroupPerAcakanKe[$i]->nama_group)
        //         ->orderBy('user_id')
        //         ->get();

        //     $allPeople = [];

        //     foreach ($orangPerGroup as $item) {
        //         $allPeople[] = $item->user_id;
        //     }

        //     $allPeopleInGroup[] = ['nama_kelompok' => $orangPerGroup[0]->nama_group, 'siswa' => $allPeople];
        // }

        // // Logic Perhitungan Guru
        // $all_grade_from_teacher = DB::table('grade_teacher')
        //     ->where('acakan_ke', '=', $acakan_ke)
        //     ->orderBy('siswa')
        //     ->get();

        // foreach ($all_grade_from_teacher as $item) {
        //     $result_guru[] = ($item->grade / $MAX_NILAI_PERTANYAAN) * $BOBOT_GURU;
        // }

        // dd("Hello World");
    }

    // Fungsi yang Mengubah Object ke Array
    // Harus diubah ke Array karane Javascript Tidak Bisa Menerima Object Dari Query Database
    // Masalah Umum Ketika Menggunakan Livewire
    protected function objectToArray($object)
    {
        $array = json_decode(json_encode($object), true);

        return $array;
    }
}
