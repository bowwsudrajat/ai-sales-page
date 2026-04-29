<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesPageController;

Route::get('/', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::get('/dashboard', [SalesPageController::class, 'index'])->name('dashboard');
	Route::post('/generate', [SalesPageController::class, 'generate']);
  Route::get('/history', [SalesPageController::class, 'history'])->middleware('auth')->name('history');
  Route::get('/history/{id}', [SalesPageController::class, 'show'])->middleware('auth')->name('history.show');
  Route::delete('/history/{id}', [SalesPageController::class, 'destroy'])->middleware('auth')->name('history.destroy');
  Route::post('/sales/{id}/regenerate', [SalesPageController::class, 'regenerate'])->name('sales.regenerate');
  Route::get('/sales/{id}', [SalesPageController::class, 'show'])->name('sales.show');
  Route::get('/sales/{id}/export', [SalesPageController::class, 'export'])->name('sales.export');
  Route::post('/sales/{id}/regenerate/{section}', [SalesPageController::class, 'regenerateSection'])->name('sales.regenerate.section');
});

require __DIR__.'/auth.php';
