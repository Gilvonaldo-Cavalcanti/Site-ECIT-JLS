<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class GerenciarPosts extends Controller
{
    public function MostrarEventos(){ // Colocar order by. Eloquent tem funcao pra isso.
        $posts = Posts::where('tipo', 'evento')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('eventos-home')->with('posts', $posts);
    }

    public function MostrarEvntPage($titulo){
        $post = Posts::get()->where('titulo', $titulo)
                            ->where('tipo', 'evento');
                        
        return view('eventos')->with('post', $post);
    }

    public function MostrarAvisos(){
        $avisos = Posts::where('tipo', 'aviso')
                         ->orderBy('id', 'DESC')
                         ->get();
        return dd($avisos);
        return redirect()->route('dashboard')->with('avisos', $avisos);
    }

    public function CriarPost(Request $request){ // Quero adicionar o autor do post no negócio também...
        try{
            $post_cont = $request->validate([ 
                'tipo' => "required",
                'titulo' => "required|string|min:1|max:255",
                'conteudo' => "required|string|min:10|max:8192",
            ]);

            if($post_cont['tipo'] == 'evento' && !isset($_SESSION["user_is_administrator"])){
                return redirect()->route("eventos")->with('flag-crt-post', 'Certifique-se de ter as devidas permissões para criar um post deste tipo!');
            }
        }
        catch(\Illuminate\Validation\ValidationException $excep){
            return redirect()->route("eventos")->withErrors($excep->errors());
        }

        $post = new Posts([
            'tipo' => $post_cont['tipo'],
            'titulo' => $post_cont['titulo'],
            'conteudo' => $post_cont['conteudo'],        
        ]);

        if($post->save())
            return redirect()->route("eventos")->with('flag-crt-post', "Post criado com sucesso!");
        else
            return redirect()->route("eventos")->with('flag-crt-post', "Erro inesperado. Tente novamente!");
    }      
    
    public function DeletarPost(Request $request){
        $post = Posts::find($request['id']);
        
        if(!$post){
            return redirect()->route("eventos")->with("flag-del-post", "Evento não encontrado. Tente novamente!");
        }
        else if($post->tipo == 'evento' && !isset($_SESSION["user_is_administrator"])){
            return redirect()->route("eventos")->with('flag-del-post', "Certifique-se de ter as devidas permissões!");
        }

        if($post->delete())
            return redirect()->route("eventos")->with('flag-del-post', "Post deletado com sucesso!");
        else
            return redirect()->route("eventos")->with('flag-del-post', "Erro inesperado. Tente novamente!");       
    }
}
