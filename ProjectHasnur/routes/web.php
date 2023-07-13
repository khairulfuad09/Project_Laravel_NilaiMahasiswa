<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('signin');
// });
Route::get('/', [SigninController::class, 'index'])->name('sign')->middleware('guest');
Route::post('/login', [SigninController::class, 'authenticate']);
Route::post('/logout', [SigninController::class, 'logout']);
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth');
Route::resource('/nilai', NilaiController::class)->middleware('auth');
// Route::get('/mahasiswa', function () {
//     return view('mahasiswa');
// });
