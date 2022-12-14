<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
}
