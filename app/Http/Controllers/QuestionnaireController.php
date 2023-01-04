<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class QuestionnaireController extends Controller
{
    public function create()
    {
        // Cek Jika Siswa Maka Tampilkan Error
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        return view('dashboard.questionnaire.create');
    }

    public function store(Request $request)
    {
        // Cek Jika Siswa Maka Tampilkan Error
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $request->validate([
            'questionnaire' => ['required', 'string', 'max:255'],
        ]);

        $questionnaire = Questionnaire::create([
            'questionnaire' => $request->questionnaire,
        ]);

        if ($questionnaire) {
            return redirect()
                ->route('question.index')
                ->with([
                    'success' => 'Sub Pertanyaan berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Sub Pertanyaan gagal dibuat'
                ]);
        }
    }

    public function edit($id)
    {
        // Cek Jika Siswa Maka Tampilkan Error
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $questionnaire = Questionnaire::findOrFail($id);

        return view('dashboard.questionnaire.edit', compact(['questionnaire']));
    }

    public function update(Request $request, $id)
    {
        // Cek Jika Siswa Maka Tampilkan Error
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }

        $request->validate([
            'questionnaire' => ['required', 'string', 'max:255'],
        ]);

        $questionnaire = Questionnaire::findOrFail($id);

        $questionnaire->update([
            'questionnaire' => $request->questionnaire,
        ]);

        if ($questionnaire) {
            return redirect()
                ->route('question.index')
                ->with([
                    'success' => 'Sub Pertanyaan berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Sub Pertanyaan gagal diubah'
                ]);
        }
    }

    public function destroy($id)
    {
        // Cek Jika Siswa Maka Tampilkan Error
        if (Gate::allows('isSiswa')) {
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        }
        
        $questionnaire = Questionnaire::findOrFail($id);
        $questionnaire->delete();

        if ($questionnaire) {
            return redirect()
                ->route('question.index')
                ->with([
                    'success' => 'Sub Pertanyaan berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('questionnaire.index')
                ->with([
                    'error' => 'Sub Pertanyaan gagal dihapus'
                ]);
        }
    }
}
