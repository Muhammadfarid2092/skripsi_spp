<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        $result = [];
        $allQuestionnaire = DB::table('questionnaire')->orderBy('id')->get();

        foreach ($allQuestionnaire as $questionnaire) {
            $selectedQuestion = DB::table('question')
                ->where('question.questionnaire_id', '=', $questionnaire->id)
                ->orderBy('id')
                ->get();

            $dataQuestion = [];
            foreach($selectedQuestion as $question) {
                $dataQuestion[] = ['id' => $question->id, 'question' => $question->question];
            }

            $result[] = ['id' => $questionnaire->id, 'questionnaire' => $questionnaire->questionnaire, 'question' => $dataQuestion];
        }

        return view('dashboard.question.question', compact(['result']));
    }

    public function create()
    {
        $questionnaire = DB::table('questionnaire')->orderBy('id')->get();

        return view('dashboard.question.create', compact(['questionnaire']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'questionnaire_id' => ['required', 'numeric'],
        ]);

        $question = Question::create([
            'question' => $request->question,
            'questionnaire_id' => $request->questionnaire_id,
        ]);

        if ($question) {
            return redirect()
                ->route('question.index')
                ->with([
                    'success' => 'Pertanyaan berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Pertanyaan gagal dibuat'
                ]);
        }
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $questionnaire = DB::table('questionnaire')->orderBy('id')->get();

        return view('dashboard.question.edit', compact(['question', 'questionnaire']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'questionnaire_id' => ['required', 'numeric'],
        ]);

        $question = Question::findOrFail($id);

        $question->update([
            'question' => $request->question,
            'questionnaire_id' => $request->questionnaire_id,
        ]);

        if ($question) {
            return redirect()
                ->route('question.index')
                ->with([
                    'success' => 'Pertanyaan berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Pertanyaan gagal diubah'
                ]);
        }
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        if ($question) {
            return redirect()
                ->route('question.index')
                ->with([
                    'success' => 'Pertanyaan berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('question.index')
                ->with([
                    'error' => 'Pertanyaan gagal dihapus'
                ]);
        }
    }
}
