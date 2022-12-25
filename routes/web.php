<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\UserController;
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

// Homepage Routing
Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');

// Custom Only Login Laravel UI

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Routing yang mewajibkan harus login (Ada middleware Auth)
Route::prefix('dashboard')->middleware('auth')->group(function () {
  Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard.index');

  Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
  });

  Route::prefix('group')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::get('/edit', [GroupController::class, 'edit'])->name('group.edit');
  });

  Route::prefix('questionnaire')->group(function () {
    Route::get('/', [QuestionnaireController::class, 'index'])->name('questionnaire.index');
    Route::get('/create', [QuestionnaireController::class, 'create'])->name('questionnaire.create');
    Route::get('/edit', [QuestionnaireController::class, 'edit'])->name('questionnaire.edit');
  });

  Route::prefix('question')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/create', [QuestionController::class, 'create'])->name('question.create');
    Route::get('/edit', [QuestionController::class, 'edit'])->name('question.edit');
  });

  Route::prefix('grade')->group(function () {
    Route::get('/', [GradeController::class, 'index'])->name('grade.index');
    Route::get('/create', [GradeController::class, 'create'])->name('grade.create');
    Route::get('/edit', [GradeController::class, 'edit'])->name('grade.edit');
  });
});
