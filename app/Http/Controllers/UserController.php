<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->get();
        return view('dashboard.user.user', compact(['data']));
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function edit()
    {
        return view('dashboard.user.edit');
    }
}
