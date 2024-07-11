<div class="avisos">
@foreach ($conteudo["posts"] as $posts)
   <div class="aviso-content">
      <a href="">
               <div class="aviso-imagem">
                  <img src="img/aviso-banner.jpg" alt="" />
               </div>
               <div class="aviso-texto">
                  <h6 class="aviso-titulo">{{ $posts->titulo }}</h6>
            </div>
      </a>
   </div>
@endforeach
</div>
