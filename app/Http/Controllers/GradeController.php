<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class GradeController extends Controller
{
    public function index()
    {
        return view('dashboard.grade.grade');
    }

    public function create()
    {
        // Cek Jika Bukan Siwa Maka Tidak Diperbolehkan
        if (Gate::denies('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('dashboard.grade.create');
    }

    public function store(Request $request)
    {
        // Cek Jika Bukan Siwa Maka Tidak Diperbolehkan
        if (Gate::denies('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $allSubQuestion = DB::table('questionnaire')->select('questionnaire')->orderBy('id')->get();
        $editedSubQuestion = [];
        
        // Fungsi mengganti spasi menjadi underscore
        foreach($allSubQuestion as $item) {
            $editedSubQuestion[] = str_replace(" ", "_", $item->questionnaire);
        }

        // Membuat Semua Request Jawaban dan Id Question Menjadi 1
        $allIdQuestionAndGrade = [];

        // Menampung Semua Nilai Di dalam 1 Array
        $grade = [];
        foreach($editedSubQuestion as $item) {
            for($i = 0; $i <= 9; $i++) {
                $selectedRequest = $item."_".$i;
                array_push($grade, $request->$selectedRequest);
            }
        }

        // Menggabungkan ID Question dengan Nilai
        $allIdQuestionAndGrade = ['question_id' => $request->question_id, 'grade' => $grade];

        $request->validate([
            'penilai' => ['required', 'numeric'],
            'dinilai' => ['required', 'numeric'],
            'question_id' => ['required', 'array'],
            'acakan_ke' => ['required', 'numeric'],
        ]);

        for($i = 0; $i < count($request->question_id); $i++) {
            DB::table('grade')->insert([
                'penilai' => $request->penilai,
                'dinilai' => $request->dinilai,
                'acakan_ke' => $request->acakan_ke,
                'grade' => $allIdQuestionAndGrade['grade'][$i],
                'question_id' => $allIdQuestionAndGrade['question_id'][$i]
            ]);
        }

        return redirect()
            ->route('grade.create')
            ->with([
                'success' => 'Nilai berhasil diinput'
            ]);

        return view('dashboard.grade.create');
    }

    public function edit()
    {
        return view('dashboard.grade.edit');
    }
}
