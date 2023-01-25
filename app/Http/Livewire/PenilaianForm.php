<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PenilaianForm extends Component
{
    // Data Penting
    public $keyAcakanKe;
    public $keyUserDinilai;
    public $allUserByGroupAndAcakanKe;
    public $allUserByGroupAndAcakanKeExpectSelf;
    public $personFilled;
    public $dataKuesioner;

    // Data untuk form Dynamic
    public $acakanKe;
    public $toggleUserDinilai;
    public $userDinilai;
    public $toggleKuesioner;

    public function render()
    {
        $idLogin = Auth::id();
        $allAcakanObj = DB::table('group')
            ->select('acakan_ke')
            ->orderBy('acakan_ke', 'asc')
            ->distinct()
            ->get();
        $allAcakan = $this->objectToArray($allAcakanObj);

        return view('livewire.penilaian-form', compact(['allAcakan', 'idLogin']));
    }

    // Fungsi ini wajib ada untuk mengecek apakah pilihan pembuatan grup sudah (lihat variable public diatas)
    // Diisi atau belum (lihat lifecycle livewire)
    public function updatedAcakanKe($acakan_ke)
    {
        if (!empty($acakan_ke)) {
            $this->toggleUserDinilai = true;
            $this->toggleKuesioner = false;

            $this->keyAcakanKe = $acakan_ke;
            $this->personFilled = $this->search_users_is_filled($acakan_ke);
            $this->allUserByGroupAndAcakanKe = $this->search_person_by_group_and_acakan_ke($acakan_ke);
            $this->allUserByGroupAndAcakanKeExpectSelf = $this->users_group_expect_self($acakan_ke);
        } else {
            $this->toggleUserDinilai = false;
            $this->toggleKuesioner = false;
        }
    }

    // Fungsi ini wajib ada untuk mengecek apakah pilihan user dinilai sudah (lihat variable public diatas)
    // Diisi atau belum (lihat lifecycle livewire)
    public function updatedUserDinilai($user_id)
    {
        if (!empty($user_id)) {
            $this->toggleKuesioner = true;

            $this->keyUserDinilai = $user_id;
            $this->dataKuesioner = $this->data_kuesioner();
        } else {
            $this->toggleKuesioner = false;
        }
    }

    protected function search_person_by_group_and_acakan_ke($acakan_ke)
    {
        $userLogin = Auth::id();
        $acakanKe = $acakan_ke;

        $groupUserByAcakan = DB::table('group')
            ->select('nama_group')
            ->where('acakan_ke', '=', $acakanKe)
            ->where('user_id', '=', $userLogin)
            ->get()[0];

        $data = DB::table('group')
            ->join('users', 'group.user_id', '=', 'users.id')
            ->select('nama_group', 'nama', 'user_id')
            ->where('acakan_ke', '=', $acakanKe)
            ->where('nama_group', '=', $groupUserByAcakan->nama_group)
            ->orderBy('user_id')
            ->get();
        $dataToArray = $this->objectToArray($data);

        return $dataToArray;
    }

    protected function users_group_expect_self($acakan_ke)
    {
        $userLogin = Auth::id();

        $result = [];

        $data = $this->search_person_by_group_and_acakan_ke($acakan_ke);
        foreach ($data as $item) {
            if ($item['user_id'] != $userLogin) {
                $result[] = $item['user_id'];
            }
        }

        return $result;
    }

    protected function data_kuesioner()
    {
        $result = [];
        $allQuestionnaire = DB::table('questionnaire')->orderBy('id')->get();

        foreach ($allQuestionnaire as $questionnaire) {
            $questionByQuestionnaireId = DB::table('question')
                ->where('questionnaire_id', '=', $questionnaire->id)
                ->orderBy('id')
                ->get();
            
            $data_question = $this->objectToArray($questionByQuestionnaireId);
            $result[] = ['sub_pertanyaan' => $questionnaire->questionnaire, 'data_question' => $data_question];
        }

        return $result;
    }

    protected function search_users_is_filled($acakan_ke)
    {
        $idLogin = Auth::id();

        $dataGroup = $this->search_person_by_group_and_acakan_ke($acakan_ke);
        $dataGrade = DB::table('grade')
                        ->select('dinilai')
                        ->where('acakan_ke', '=', $acakan_ke)
                        ->where('penilai', '=', $idLogin)
                        ->distinct()
                        ->get();
        $arrayGrade = [];
        $arrayGroup = [];

        foreach ($dataGrade as $item) {
            $arrayGrade[] = $item->dinilai;
        }

        foreach ($dataGroup as $item) {
            $arrayGroup[] = $item['user_id'];
        }

        // Orang yang sudah terisi
        $data = array_intersect($arrayGrade, $arrayGroup);
        
        return $data;
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
