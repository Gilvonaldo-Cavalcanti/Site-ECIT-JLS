<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Autenticacao;
use App\Http\Controllers\Staffs;
use App\Http\Controllers\GerenciarPosts;
use App\Http\Controllers\UsersConteudo;

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

Route::get('eventos', [GerenciarPosts::class, 'MostrarEventos'])->name('eventos');
// colocar subdiretorio antes abaixo antes de titulo.
// diferenciar de criar e del posts.
Route::get('eventos/{titulo}', [GerenciarPosts::class, 'MostrarEvntPage']);

Route::get('contato', function () {
    return view('contato');
});


/* Status code páginas related: */
// Possibilidade de trocar pelas páginas template do serviço HTTP (!)

/* Autenticação related: */
Route::get('login', [Autenticacao::class, 'MostrarFormLogin'])->name('login');
Route::post('login', [Autenticacao::class, 'Login']);

Route::post('logout', [Autenticacao::class, 'Logout']);

Route::middleware(['VerificarAuth'])->group(function (){    
    Route::get('/dashboard', [UsersConteudo::class, 'MostrarDashboard'])->name('dashboard');

    // Gerenciar Users
    //
    Route::post('dashboard/registrar', [Staffs::class, 'Registro']); 
    Route::post('dashboard/deletar-user', [Staffs::class, 'DeletarUser']);

    // Gerenciar Posts 
    // - General
    Route::post('eventos/criar-post', [GerenciarPosts::class, 'CriarPost']);
    Route::post('eventos/deletar-post', [GerenciarPosts::class, 'DeletarPost']);

    // - Avisos na Dashboard
    Route::get('dashboard#avisos', [GerenciarPosts::class, 'MostrarAvisos']);
});


/* APIs externas related: */
Route::get('google-autocomplete', [GoogleController::class, 'index']);
