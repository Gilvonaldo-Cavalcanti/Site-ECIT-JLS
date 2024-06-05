<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Autenticacao;

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
    return view('welcome');
})->name('home');

Route::get('nossa-historia', function () {
    return view('nossa-historia');
});

Route::get('equipe-desenvolvimento', function () {
    return view('equipe-desenvolvimento');
});

Route::get('eventos', function () {
    return view('eventos');
});

Route::get('contato', function () {
    return view('contato');
})->name('contato');

Route::get('registro', [Autenticacao::class, 'MostrarFormReg'])->name('formreg');
Route::post('registro', [Autenticacao::class, 'Registro']);

Route::get('login', [Autenticacao::class, 'MostrarFormLogin'])->name('formlogin');
Route::post('login', [Autenticacao::class, 'Login']);

Route::get('logout', [Autenticacao::class, 'Logout']);

Route::get('dashboard', function(){
    return view('dashboard');
})->middleware('VerificarAuth');

Route::get('google-autocomplete', [GoogleController::class, 'index']);
