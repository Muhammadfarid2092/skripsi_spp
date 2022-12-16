<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('dashboard.question.question');
    }

    public function create()
    {
        return view('dashboard.question.create');
    }

    public function edit()
    {
        return view('dashboard.question.edit');
    }
}
