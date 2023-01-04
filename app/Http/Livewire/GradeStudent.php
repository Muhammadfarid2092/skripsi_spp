<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GradeStudent extends Component
{
    public function render()
    {
        $allAcakanObj = DB::table('group')
            ->select('acakan_ke')
            ->orderBy('acakan_ke', 'asc')
            ->distinct()
            ->get();
        $allAcakan = $this->objectToArray($allAcakanObj);

        return view('livewire.grade-student', compact(['allAcakan']));
    }

    protected function calculate_grade()
    {
        $totalNilaiSendiri = 10 * 50;
        $totalSiswa = 10 * 50 * 3;

        $x = DB::table('grade')->where('dinilai', '=', 25)->get();

        $dataNilaiSendiri = DB::table('grade')
                ->select(DB::raw('SUM(grade) as total_nilai, dinilai'))
                ->whereColumn('penilai', '=', 'dinilai')
                ->orderBy('dinilai')
                ->groupBy('dinilai')
                ->get();

        $dataSiswa = DB::table('grade')
                ->select(DB::raw('SUM(grade) as total_nilai, dinilai'))
                ->whereColumn('penilai', '!=', 'dinilai')
                ->orderBy('dinilai')
                ->groupBy('dinilai')
                ->get();
        
        dd(($dataNilaiSendiri[24]->total_nilai + $dataSiswa[24]->total_nilai) / ($totalNilaiSendiri + $totalSiswa));
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
