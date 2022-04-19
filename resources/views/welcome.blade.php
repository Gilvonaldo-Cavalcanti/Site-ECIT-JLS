@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')

<img class="imagem-principal" src="img/escolajls.webp" alt="">

<div id="search-container" class="col=-md-12">
    <h1>Busque uma Notícia</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurando...">
    </form>
</div>


<div class="categorias">

  <h1>Categorias</h1>
<div class="card-group">

<div class="card bg-dark text-white">
  <img class="card-img" src="https://todospelaeducacao.org.br/wordpress/wp-content/uploads/2020/10/thumb-irs.png" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Protagonismo Escolar</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>

<div class="card bg-dark text-white">
  <img class="card-img" src="https://todospelaeducacao.org.br/wordpress/wp-content/uploads/2020/10/thumb-irs.png" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>

<div class="card bg-dark text-white">
  <img class="card-img" src="https://todospelaeducacao.org.br/wordpress/wp-content/uploads/2020/10/thumb-irs.png" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>
</div>
</div>


<div>
    <h1>Teste</h1>
</div>



@endsection