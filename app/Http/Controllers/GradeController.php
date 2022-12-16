<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return view('dashboard.grade.grade');
    }

    public function create()
    {
        return view('dashboard.grade.create');
    }

    public function edit()
    {
        return view('dashboard.grade.edit');
    }
}
