<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard.questionnaire.questionnaire');
    // }

    public function create()
    {
        return view('dashboard.questionnaire.create');
    }

    public function store(Request $request)
    {
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
        $questionnaire = Questionnaire::findOrFail($id);

        return view('dashboard.questionnaire.edit', compact(['questionnaire']));
    }

    public function update(Request $request, $id)
    {
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
