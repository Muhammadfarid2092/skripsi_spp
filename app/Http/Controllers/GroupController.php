<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('dashboard.group.group');
    }

    public function create()
    {
        return view('dashboard.group.create');
    }

    public function edit()
    {
        return view('dashboard.group.edit');
    }
}
