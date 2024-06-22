<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(Auth::user())
        return redirect('/welcome');
    else
        return redirect('/login');
});

Route::get('/project', [ProjectController::class, 'index'])->middleware('auth');

Route::get('/project/{id}', [ProjectController::class, 'show'])->where('id', '[0-9]+')->middleware('auth');

Route::get('/project/create', [ProjectController::class, 'create'])->middleware('auth');

Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->where('id', '[0-9]+')->middleware('auth');

Route::get('/project/destroy/{id}', [ProjectController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth');

Route::post('/project/update/{id}', [ProjectController::class, 'update'])->where('id', '[0-9]+')->middleware('auth');

Route::post('/project', [ProjectController::class, 'store'])->middleware('auth');

Route::get('/task', [TaskController::class, 'index'])->middleware('auth');

Route::get('/task/{id}', [TaskController::class, 'show'])->where('id', '[0-9]+')->middleware('auth');

Route::get('/task/create', [TaskController::class, 'create'])->middleware('auth');

Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->where('id', '[0-9]+')->middleware('auth');

Route::get('/task/destroy/{id}', [TaskController::class, 'destroy'])->where('id', '[0-9]+')->middleware('auth');

Route::post('/task/update/{id}', [TaskController::class, 'update'])->where('id', '[0-9]+')->middleware('auth');

Route::post('/task', [TaskController::class, 'store'])->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/error', function () {
//     return view('error', ['message' => session('message')]);
// });