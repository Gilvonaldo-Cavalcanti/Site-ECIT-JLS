<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Autenticacao;
use App\Http\Controllers\Staffs;

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

/* Páginas principais related: */
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
});


/* Status code páginas related: */
// Possibilidade de trocar pelas páginas template do serviço HTTP (!)
Route::get('unauthorized', function(){
    return view('unauthorized');
})->name('unauthorized');


/* Autenticação related: */
Route::get('login', [Autenticacao::class, 'MostrarFormLogin'])->name('login');
Route::post('login', [Autenticacao::class, 'Login']);

Route::post('logout', [Autenticacao::class, 'Logout']);


Route::middleware(['VerificarAuth'])->group(function (){    
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::post('dashboard/registrar', [Staffs::class, 'Registro']); // dashboard trata diretammente do registro
    Route::post('dashboard/deletar', [Staffs::class, 'DeletarUser']);
});


/* APIs externas related: */
Route::get('google-autocomplete', [GoogleController::class, 'index']);
