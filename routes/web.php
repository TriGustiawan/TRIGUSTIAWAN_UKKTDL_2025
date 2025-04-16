<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/simpan', [App\Http\Controllers\HomeController::class, 'simpan'])->name('simpan');
Route::get('/ubah/{idtudu}/{status}', [App\Http\Controllers\HomeController::class, 'ubahstat'])->name('ubahstat');
Route::get('/hapus/{id}', [App\Http\Controllers\HomeController::class, 'hapus'])->name('hapus');
Route::post('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');


