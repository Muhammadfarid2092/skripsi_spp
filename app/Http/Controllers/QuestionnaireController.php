<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view('dashboard.questionnaire.questionnaire');
    }

    public function create()
    {
        return view('dashboard.questionnaire.create');
    }

    public function edit()
    {
        return view('dashboard.questionnaire.edit');
    }
}
