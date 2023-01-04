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
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
  });

  Route::prefix('group')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::post('/', [GroupController::class, 'store'])->name('group.store');
    Route::delete('/{acakan_ke}', [GroupController::class, 'destroy'])->name('group.destroy');
  });

  Route::prefix('questionnaire')->group(function () {
    Route::get('/create', [QuestionnaireController::class, 'create'])->name('questionnaire.create');
    Route::post('/', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::get('/{id}/edit', [QuestionnaireController::class, 'edit'])->name('questionnaire.edit');
    Route::put('/{id}', [QuestionnaireController::class, 'update'])->name('questionnaire.update');
    Route::delete('/{id}', [QuestionnaireController::class, 'destroy'])->name('questionnaire.destroy');
  });

  Route::prefix('question')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/create', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('question.edit');
    Route::put('/{id}', [QuestionController::class, 'update'])->name('question.update');
    Route::delete('/{id}', [QuestionController::class, 'destroy'])->name('question.destroy');
  });

  Route::prefix('grade')->group(function () {
    Route::get('/', [GradeController::class, 'index'])->name('grade.index');
    Route::get('/create', [GradeController::class, 'create'])->name('grade.create');
    Route::post('/create', [GradeController::class, 'store'])->name('grade.store');
    Route::get('/teacher', [GradeController::class, 'index_teacher'])->name('grade.index_teacher');
    Route::post('/teacher', [GradeController::class, 'store_teacher'])->name('grade.store_teacher');
  });
});
