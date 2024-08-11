<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;

use App\Http\Controllers\StudentController;

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/tracks', [TrackController::class, 'index'])->name('tracks.index');

Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');

Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');

Route::get('/tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');

Route::put('/tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');

Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');
