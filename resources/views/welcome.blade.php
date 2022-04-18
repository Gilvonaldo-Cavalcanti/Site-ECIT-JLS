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
    
  </div>
</div>

<div class="card bg-dark text-white">
  <img class="card-img" src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80.png" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Excelente Profissonais</h5>
    <p class="card-text">Gostariamos nesse momento de boas-vindas a vocês caros vistantes exaltar nossos profissionais, que se abilitam a todo momento em ensinar, cuidar e proteger seus alunos de forma exemplar durante o ambinto escolar. Desde a área da limpeza a até mesmo dentro da sala de aula. </p>
    
  </div>
</div>

<div class="card bg-dark text-white">
  <img class="card-img" src="https://todospelaeducacao.org.br/wordpress/wp-content/uploads/2020/10/thumb-irs.png" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Ensino Tecnico Diferenciado</h5>
    <p class="card-text">Além de nós ensinarmos aos nossos alunos o ensino médio como deveria ser, também temos o ensino tecnico na área de informática e musica, utilizando diversas praticas diferenciadas e divertidas aos nossos alunos para aprenderem da melhor forma possivel. Assim consiguiremos formar adultos melhores para o nosso mundo.</p>
    
  </div>
</div>
</div>
</div>


<div>
    <h1><!-- Teste --></h1>
</div>



@endsection