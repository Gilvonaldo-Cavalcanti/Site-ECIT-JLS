@extends('layouts.main')

@section('title', 'Site JLS')

@section('content')
<x-guest-layout>


<img class="imagem-principal" src="img/escolajls.webp" alt="">



    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="py-12 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Educação</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">A better way to send money</p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.</p>
    </div>

    <div class="mt-10">
      <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/globe-alt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Nossas Conquistas</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">No hidden fees</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/lightning-bolt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transfers are instant</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: outline/annotation -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Mobile notifications</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
        </div>
      </dl>
    </div>
  </div>
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

</x-guest-layout>


@endsection