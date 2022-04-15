<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('register-student', [\App\Http\Controllers\Auth\RegisterStudentController::class, 'create'])->name('register-student.create');
Route::post('register-student', [\App\Http\Controllers\Auth\RegisterStudentController::class, 'store'])->name('register-student.store');

Route::get('register-teacher', [\App\Http\Controllers\Auth\RegisterTeacherController::class, 'create'])->name('register-teacher.create');
Route::post('register-teacher', [\App\Http\Controllers\Auth\RegisterTeacherController::class, 'store'])->name('register-teacher.store');

Route::get('register-trainer', [\App\Http\Controllers\Auth\RegisterTrainerController::class, 'create'])->name('register-trainer.create');
Route::post('register-trainer', [\App\Http\Controllers\Auth\RegisterTrainerController::class, 'store'])->name('register-trainer.store');

Route::resource('posts', \App\Http\Controllers\PostController::class);
require __DIR__.'/auth.php';
