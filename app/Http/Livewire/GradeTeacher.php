<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GradeTeacher extends Component
{
    public $acakanKe;
    public $toggleForm;
    public $studentFilled;
    public $studentNotFilled;

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
            $this->studentFilled = $this->studentFilledFunction($acakan_ke);
            $this->studentNotFilled = $this->studentNotFilledFunction($acakan_ke);
        } else {
            $this->toggleForm = false;
        }
    }

    protected function studentFilledFunction($acakan_ke)
    {
        $studentFilledDB = DB::table('grade_teacher')
            ->select('siswa')
            ->where('acakan_ke', '=', $acakan_ke)
            ->get();

        $studentFilled = $this->objectToArray($studentFilledDB);

        return $studentFilled;
    }

    protected function studentNotFilledFunction($acakan_ke)
    {
        $studentNotFilledDB = DB::table('group')
            ->join('users', 'group.user_id', '=', 'users.id')
            ->select('nama', 'nip_nis', 'user_id', 'acakan_ke')
            ->where('acakan_ke', '=', $acakan_ke)
            ->orderBy('user_id')
            ->get();
        
        $studentNotFilled = $this->objectToArray($studentNotFilledDB);

        return $studentNotFilled;
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
