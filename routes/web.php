<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/import', function () {
    return view('import');
});

Route::post('/importcsv', [UserController::class, 'importcsv'])->name('importcsv');
Route::post('/upload', [UserController::class, 'uploadmedia'])->name('upload');
Route::get('/getsectionaniaml', [UserController::class, 'getsectionaniaml'])->name('getsectionaniaml');
Route::get('/passes', [UserController::class, 'passes'])->name('passes');