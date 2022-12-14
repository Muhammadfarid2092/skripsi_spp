<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'homepage']);
Route::get('/contact', [DashboardController::class, 'contact']);
Route::get('/about', [DashboardController::class, 'about']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/kuesioner', function () {
    return view('dashboard.kuesioner.kuesioner');
});

Route::get('/home', function () {
    return view('newlanding_page');
});