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
Route::get('/uploadview', [UserController::class, 'uploadview'])->name('uploadview');
Route::post('/upload', [UserController::class, 'uploadmedia'])->name('upload');
// Route::get('/getsectionaniaml', [UserController::class, 'getsectionaniaml'])->name('getsectionaniaml');
Route::get('/testvalidationview', [UserController::class, 'testvalidationview'])->name('testvalidationview');
Route::post('/test-validation', [UserController::class, 'testValidation'])->name('test.validation');