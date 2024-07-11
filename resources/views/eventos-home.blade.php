@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')

<div class="eventos"> 
    <h1 class="botm">Nossos<br><strong>Eventos</strong></h1>
    
    @staff
    <div class="gerenciar-posts">
        <div class="flex-container">
            <div class="criar-posts">
                <h2 class="fields-tabelas">Criar Post</h2>
                
                @if (session()->has('flag-crt-post'))
                    <p class="msg-aviso">{{ session('flag-crt-post') }}</p>
                @else
                    @if ($errors->any())
                        <div class="aviso_erro">
                            @foreach($errors->all() as $error)
                                <p class="msg-aviso">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                @endif

                <form action="/eventos/criar-post" method="POST">
                    @csrf
                    <div class="back-info">
                        <input type="radio" id="tipo1" name="tipo" value="aviso" checked>
                        <label for="tipo1">Novo Aviso</label>
                        @admin
                            <input type="radio" id="tipo2" name="tipo" value="evento">
                            <label for="tipo2">Novo Evento</label>
                        @endadmin
                    </div>

                    <div class="important-info">
                        <input placeholder="Título" type="text" name="titulo"><br>
                        <textarea class="conteudo-post" id="conteudo-post" placeholder="Conteúdo do Post" name="conteudo" cols="43" rows="5"></textarea>
                    </div>

                    <button type="submit">Criar Post</button>
                </form>
            </div>

            <div class="deletar-posts">
                <h2 class="fields-tabelas">Deletar Post</h2>

                @if (session()->has('flag-del-post'))
                    <p class="msg-aviso">{{ session('flag-del-post') }}</p>
                @endif

                <form action="/eventos/deletar-post" method="POST">
                    @csrf    
                    <input placeholder="Id do Post" type="number" name="id">
                    <button type="submit">Deletar Post</button>
                </form>
            </div>
        </div>
    </div>
    @endstaff

    <div class="tabs-eventos">
        @foreach($posts as $post)
            <div class="tab-individual">
                <a href="/eventos/{{$post->titulo}}">
                    <h2 class="titulo-evento">{{$post->titulo}}</h2>
                </a>

                <div class="evento-dados">
                    @staff
                        <p class="evento-id">Evento Número: {{$post->id}}</p>
                    @endstaff
                    <p class="evento-time">{{$post->created_at}}</p>
                </div>
            </div>

            <hr>
        @endforeach
    </div>
</div>

@endsection

