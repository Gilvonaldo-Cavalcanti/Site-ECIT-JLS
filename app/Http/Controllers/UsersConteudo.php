<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class UsersConteudo extends Controller
{
    public function MostrarDashboard(){
        // Tratamento dos posts de aviso ---------------#
        $posts = Posts::where('tipo', 'aviso')
                        ->orderBy('id', 'DESC')
                        ->get();

        $conteudo = compact("posts");
        return view('dashboard')->with(compact('conteudo'));
    }
}
