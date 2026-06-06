<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\TranslatorController;


Route::get('/translator', [TranslatorController::class, 'index']);
Route::post('/translate', [TranslatorController::class, 'translate']);
Route::post('/translate2', [TranslatorController::class, 'translate2']);


Route::get('/index', [UserController::class, 'index'])->name('users.index');
Route::post('/store', [UserController::class, 'store'])->name('users.store');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');


