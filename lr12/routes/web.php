<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksClientController;
use App\Http\Controllers\LangController;

Route::get('/', function () {
    return redirect('/client/books');
});

Route::get('/lang/{locale}', [LangController::class, 'switch'])->name('lang.switch');

Route::get('/client/books', [BooksClientController::class, 'index'])->name('client.books.index');
Route::get('/client/books/create', [BooksClientController::class, 'create']);
Route::post('/client/books', [BooksClientController::class, 'store']);
Route::get('/client/books/{id}/edit', [BooksClientController::class, 'edit']);
Route::put('/client/books/{id}', [BooksClientController::class, 'update']);
Route::delete('/client/books/{id}', [BooksClientController::class, 'destroy']);
