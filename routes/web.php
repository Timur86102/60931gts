<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/project', [ProjectController::class, 'index']);

Route::get('/project/{id}', [ProjectController::class, 'show'])->where('id', '[0-9]+');;

Route::get('/project/create', [ProjectController::class, 'create']);

Route::get('/project/edit/{id}', [ProjectController::class, 'edit']);

Route::get('/project/destroy/{id}', [ProjectController::class, 'destroy']);

Route::post('/project/update/{id}', [ProjectController::class, 'update']);

Route::post('/project', [ProjectController::class, 'store']);

Route::get('/task', [TaskController::class, 'index']);