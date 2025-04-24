<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/why', function () {
    return view('why');
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware("auth");
Route::post('/login', [SessionController::class, 'store']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', [RegisterController::class, "create"])->middleware("guest");
Route::get('/login', [SessionController::class, 'create'])->middleware("auth");
Route::get('/meow', [SessionController::class, 'meow'])->middleware("auth");
Route::get('/login', [SessionController::class, "create"])->name("login");


Route::post('/diaries/{diary}', [DiaryController::class, 'update']);

Route::post('/todos/{todo}', [ToDoController::class, 'update']);

Route::post('/todos', [ToDoController::class, 'store']);

Route::post('/diaries', [DiaryController::class, 'store']);

Route::delete('/diaries/{diary}', [DiaryController::class, 'destroy'])->middleware("auth");

Route::delete('/todos/{todo}', [ToDoController::class, 'destroy'])->middleware("auth");

Route::get('/todos/create', [ToDoController::class, 'create'])->middleware("auth");

Route::get('/diaries/{diary}/edit', [DiaryController::class, 'edit'])->middleware("auth");

Route::get('/todos/{todo}/edit', [ToDoController::class, 'edit'])->middleware("auth");

Route::get('/diaries/create', [DiaryController::class, 'create'])->middleware("auth");

Route::get('/todos', [ToDoController::class, 'index'])->middleware("auth")->name('todos.index');

Route::get('/diaries', [DiaryController::class, 'index'])->middleware("auth");

Route::get('/todos/{todo}', [ToDoController::class, 'show'])->middleware("auth");

Route::get('/diaries/{diary}', [DiaryController::class, 'show'])->middleware("auth");

