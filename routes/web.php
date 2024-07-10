<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['login' => false,'register' => false,'verify' => true]);

route::middleware('guest')->group(function(){
    Route::get('/login',Login::class)->name('login');
    Route::get('/register',Register::class)->name('register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('alternatif', [App\Http\Controllers\AlternatifController::class, 'data']);
Route::get('alternatif/add', [App\Http\Controllers\AlternatifController::class, 'add']);
Route::post('alternatif', [App\Http\Controllers\AlternatifController::class, 'addProcess']);
Route::get('alternatif/edit/{id}', [App\Http\Controllers\AlternatifController::class, 'edit']);
Route::patch('alternatif/{id}', [App\Http\Controllers\AlternatifController::class, 'editProcess']);
Route::delete('alternatif/{id}', [App\Http\Controllers\AlternatifController::class, 'delete']);

Route::get('kriteria', [App\Http\Controllers\KriteriaController::class, 'data']);
Route::get('kriteria/add', [App\Http\Controllers\KriteriaController::class, 'add']);
Route::post('kriteria', [App\Http\Controllers\KriteriaController::class, 'addProcess']);
Route::get('kriteria/edit/{id}', [App\Http\Controllers\KriteriaController::class, 'edit']);
Route::patch('kriteria/{id}', [App\Http\Controllers\KriteriaController::class, 'editProcess']);
Route::delete('kriteria/{id}', [App\Http\Controllers\KriteriaController::class, 'delete']);

Route::get('wp', [App\Http\Controllers\WpController::class, 'data']);
