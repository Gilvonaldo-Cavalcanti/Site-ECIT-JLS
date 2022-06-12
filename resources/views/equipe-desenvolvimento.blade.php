@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')

<h1>Página da Equipe de Desenvolvimento</h1>

<div class="container-equipe">
  <div class="row">
    <div class="col">
        <figure class="figure">
            <img src="img/kelviny.jpeg" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption text-end">Kelviny, 3º Ano C.</figcaption>
        </figure>
    </div>
    <div class="col">
        <figure class="figure">
            <img src="img/lucas.jpeg" class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption text-end">Lucas, 3º Ano B</figcaption>
        </figure>
    </div>
    <div class="col">
        <figure class="figure">
            <img src="..." class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption text-end">A caption for the above image.</figcaption>
        </figure>
    </div>
    <div class="col">
        <figure class="figure">
            <img src="..." class="figure-img img-fluid rounded" alt="...">
            <figcaption class="figure-caption text-end">A caption for the above image.</figcaption>
        </figure>
    </div>
  </div>
</div>

@endsection