<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('register-student', [\App\Http\Controllers\Auth\RegisterStudentController::class, 'create'])->name('register-student.create');
Route::post('register-student', [\App\Http\Controllers\Auth\RegisterStudentController::class, 'store'])->name('register-student.store');

Route::get('register-teacher', [\App\Http\Controllers\Auth\RegisterTeacherController::class, 'create'])->name('register-teacher.create');
Route::post('register-teacher', [\App\Http\Controllers\Auth\RegisterTeacherController::class, 'store'])->name('register-teacher.store');

Route::get('register-trainer', [\App\Http\Controllers\Auth\RegisterTrainerController::class, 'create'])->name('register-trainer.create');
Route::post('register-trainer', [\App\Http\Controllers\Auth\RegisterTrainerController::class, 'store'])->name('register-trainer.store');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login.create');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');

Route::any('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::resource('posts', \App\Http\Controllers\PostController::class);

Route::view('chat', 'test/chat')->middleware('auth');
//require __DIR__.'/auth.php';


Route::get('home', [HomeController::class, 'index'])->middleware('auth')->name('home.index');
Route::get('profile/{id}', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::post('add-friend/{id}', [FriendController::class, 'store'])->middleware('auth')->name('friend.store');

Route::get('modules/{id}', [ModuleController::class, 'show'])->middleware('auth')->name('modules.show');
Route::post('modules/{id}/lessons', [ModuleController::class, 'storeLesson'])->middleware('auth')->name('modules.store.lesson');
Route::post('modules/{id}/tutorials', [ModuleController::class, 'storeTutorial'])->middleware('auth')->name('modules.store.tutorial');
Route::post('modules/{id}/works', [ModuleController::class, 'storeWork'])->middleware('auth')->name('modules.store.work');

Route::get('modules', [ModuleController::class, 'index'])->middleware('auth')->name('modules.index');
