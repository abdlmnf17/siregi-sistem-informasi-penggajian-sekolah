<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/tambah', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/tambah/post', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');

Route::get('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');

Route::put('/guru/edit/{id}', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');


Route::get('/guru/profile', [App\Http\Controllers\GuruController::class, 'show'])->name('profile');

Route::delete('/guru/hapus', [App\Http\Controllers\GuruController::class, 'destroy'])->name('guru.destroy');

Route::get('/guru/detail/{id}', [App\Http\Controllers\GuruController::class, 'show'])->name('guru.show');

Route::delete('/guru/deletesel', [App\Http\Controllers\GuruController::class, 'destroysel'])->name('guru.destroysel');
