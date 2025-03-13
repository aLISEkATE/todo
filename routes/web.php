<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\DiaryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/why', function () {
    return view('why');
});

Route::post('/diaries/{diary}', [DiaryController::class, 'update']);

Route::post('/todos/{todo}', [ToDoController::class, 'update']);

Route::post('/todos', [ToDoController::class, 'store']);

Route::post('/diaries', [DiaryController::class, 'store']);

Route::delete('/diaries/{diary}', [DiaryController::class, 'destroy']);

Route::delete('/todos/{todo}', [ToDoController::class, 'destroy']);

Route::get('/todos/create', [ToDoController::class, 'create']);

Route::get('/diaries/{diary}/edit', [DiaryController::class, 'edit']);

Route::get('/todos/{todo}/edit', [ToDoController::class, 'edit']);

Route::get('/diaries/create', [DiaryController::class, 'create']);

Route::get('/todos', [ToDoController::class, 'index']);

Route::get('/diaries', [DiaryController::class, 'index']);

Route::get('/todos/{todo}', [ToDoController::class, 'show']);

Route::get('/diaries/{diary}', [DiaryController::class, 'show']);

