<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class GradeController extends Controller
{
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
        foreach ($allSubQuestion as $item) {
            $editedSubQuestion[] = str_replace(" ", "_", $item->questionnaire);
        }

        // Membuat Semua Request Jawaban dan Id Question Menjadi 1
        $allIdQuestionAndGrade = [];

        // Menampung Semua Nilai Di dalam 1 Array
        $grade = [];
        foreach ($editedSubQuestion as $item) {
            for ($i = 0; $i <= 9; $i++) {
                $selectedRequest = $item . "_" . $i;
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

        for ($i = 0; $i < count($request->question_id); $i++) {
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

    public function index()
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::denies('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('dashboard.grade.grade');
    }

    public function index_teacher()
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('dashboard.grade.index_teacher');
    }

    public function create_teacher()
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('dashboard.grade.grade_teacher');
    }

    public function store_teacher_auto(Request $request)
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $request->validate([
            'acakan_ke' => ['required', 'numeric'],
        ]);

        DB::table('grade_teacher')->where('acakan_ke', '=', $request->acakan_ke)->delete();

        $allSiswa = DB::table('users')
            ->where('role', '=', 'siswa')
            ->get();

        foreach($allSiswa as $item) {
            DB::table('grade_teacher')->insert([
                'grade' => 10,
                'siswa' => $item->id,
                'acakan_ke' => $request->acakan_ke
            ]);
        }

        return redirect()
            ->route('grade.create_teacher')
            ->with([
                'success' => 'Nilai berhasil dibuat'
            ]);
    }

    public function store_teacher_manual(Request $request)
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $request->validate([
            'acakan_ke' => ['required', 'numeric'],
            'siswa' => ['required', 'numeric'],
            'grade' => ['required', 'numeric'],
        ]);

        $grade_teacher = DB::table('grade_teacher')->insert([
            'acakan_ke' => $request->acakan_ke,
            'siswa' => $request->siswa,
            'grade' => $request->grade,
        ]);

        if ($grade_teacher) {
            return redirect()
                ->route('grade.create_teacher')
                ->with([
                    'success' => 'Nilai berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Nilai gagal dibuat'
                ]);
        }
    }

    public function edit_teacher($id, $acakan_ke)
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $data = DB::table('grade_teacher')
            ->join('users', 'grade_teacher.siswa', '=', 'users.id')
            ->select('grade_teacher.id AS gd_id', 'nama', 'nip_nis', 'siswa', 'grade')
            ->where('acakan_ke', '=', $acakan_ke)
            ->where('grade_teacher.id', '=', $id)
            ->orderBy('siswa')
            ->get()[0];
        $current_acakan_ke = $acakan_ke;

        return view('dashboard.grade.edit_teacher', compact(['data', 'current_acakan_ke']));
    }

    public function update_teacher(Request $request, $id, $acakan_ke)
    {
        // Cek Jika Siswa Maka Error (Guru / Admin Berhasil)
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $request->validate([
            'grade' => ['required', 'numeric'],
        ]);

        $data = DB::table('grade_teacher')
            ->where('acakan_ke', '=', $acakan_ke)
            ->where('id', '=', $id)
            ->update(['grade' => $request->grade]);
        

        if ($data) {
            return redirect()
                ->route('grade.create_teacher')
                ->with([
                    'success' => 'Nilai berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Nilai gagal diubah'
                ]);
        }
    }
}
