@extends('layouts.main')

@section('title', 'Site JLS')

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
  <img class="card-img" src="https://unileste.catolica.edu.br/portal/wp-content/uploads/2021/06/jovem-estudante-do-sexo-masculino-de-vista-frontal-em-t-shirt-branca-usando-mascara-preta-e-segurando-arquivos-amarelos-sobre-o-fundo-azul-claro_140725-41136.jpg" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Protagonismo Escolar</h5>
    <p class="card-text">Nossa escola se foca no protagonista escolar de nossos alunos os dando espaço para criar e se reimaginar de formas diferentes e mais atrativas não só para ele como para o mundo.</p>
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