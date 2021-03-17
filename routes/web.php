<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index'])->name('client.index');

Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');

Route::get('/client/{id}/edit', [ClientController::class, 'show'])->name('client.show');
Route::post('/client/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');

Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
