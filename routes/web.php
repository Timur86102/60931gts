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
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => "Hello Gabbasov Timur!"]);
});

Route::get('/project', [ProjectController::class, 'index'])->middleware('auth');

Route::get('/project/{id}', [ProjectController::class, 'show'])->where('id', '[0-9]+')->middleware('auth');

Route::get('/project/create', [ProjectController::class, 'create'])->middleware('auth');

Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->middleware('auth');

Route::get('/project/destroy/{id}', [ProjectController::class, 'destroy'])->middleware('auth');

Route::post('/project/update/{id}', [ProjectController::class, 'update'])->middleware('auth');

Route::post('/project', [ProjectController::class, 'store'])->middleware('auth');

Route::get('/task', [TaskController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});