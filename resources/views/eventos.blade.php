@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')

<div class="evento-content"> 
    @foreach($post as $rows)
        <h1 class="cont-titulo">{{$rows->titulo}}</h1>
        <p class="cont-texto">{{$rows->conteudo}}</p>
    @endforeach
</div>

@endsection
