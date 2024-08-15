<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" href="img/logo-jls.png" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="/site/style.css">
        <!-- CSS local -->
        <link rel="stylesheet" href="/css/style.css" />
        @section('js-scripts')
        @show
        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        <!-- Material Design Iconic Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"> 
  </head>

  <body>
    <header>
            <nav>
               <div class="menu-icon">
                  <i class="fa fa-bars fa-2x"></i>
               </div>
              <div class="logo">
                <a href="/" >
                  <img id="logo" src="/img/logo-jls.png" alt="logo">
                </a>
              </div>

                    
               <div class="menu">
                  <ul>
                      
                    <li><a href="/institucional">Institucional</a></li>
                    <li><a href="/eventos">Eventos</a></li>
                    <li><a href="/nossa-historia">Nossa História</a></li>
                    <li><a href="/contato">Contato</a></li>
                
                @conv
                    <li><a href="/login">Entrar</a></li>
                @endconv
                
                @autcd
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <li><a href="/logout"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair</a></li>
                       </form>
                    </li>
                @endautcd

                  </ul>
               </div>
            </nav>
         </header>

        <script src="/js/app.js"></script>

        <script src="/site/jquery.js"></script>

        <main class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">
                        {{ session('msg') }}
                    </p>
                @endif
                @yield('content')
            </div>
        </main>

@autcd
<div id="body"> 
  
  <div id="chat-circle" class="btn btn-raised prime zmdi zmdi-comment-outline zmdi-hc-2x">
        <div id="chat-overlay"></div>
  </div>
  
  <div class="chat-box">
    <div class="chat-box-header">
      <span class="chat-box-profile"><i class="zmdi zmdi-account-circle"></i></span>
      Tire Suas Dúvidas 
      <span class="chat-box-toggle"><i class="zmdi zmdi-close"></i></span>
    </div>
    <div class="chat-box-body">
      <div class="chat-box-overlay">   
      </div>
      <ul class="chat-logs">
      
      
      </ul>
    </div>
    
      <div class="chat-input">      
        <form>
          <input type="text" id="chat-input" placeholder="Enviar uma mensagem..."/>
        <button type="submit" class="chat-submit" id="chat-submit"><i class="zmdi zmdi-mail-send"></i></button>
        </form>      
      </div>
    
  </div>
@endautcd

</div>

  <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
  
    <script src="/js/app.js"></script>

    <div class="divisoria-colorida-governo">
      <div class="cor-1"></div>
      <div class="cor-2"></div>
      <div class="cor-3"></div>
      <div class="cor-4"></div>
      <div class="cor-5"></div>
    </div>

    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Endereço</h3>
                        <ul>
                            <li>Rua Wagner Augusto Bezerra Japiassú</li>
                            <li>Nº 00, Centro</li>
                            <li>Monteiro - PB</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Sobre</h3>
                        <ul>
                            <li><a href="/equipe-desenvolvimento">Equipe de Desenvolvimento do Site</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Institucional</h3>
                        <p>Escola Integral Técnica José Leite de Souza oferece cursos técnicos, integrados ao ensino médio, de Manutenção e Suporte em Informática e Instrumento Musical.</p>
                    </div>
                    <div class="col item social"><a href="https://www.facebook.com/EscolaEstadualJoseLeiteDeSouza" target="_blank" rel="external"><i class="zmdi zmdi-facebook"></i></a><a href="#"><i class="zmdi zmdi-twitter"></i></a><a href="https://www.youtube.com/channel/UCQLW0K7iUodpcRRP9hdP7Xg" target="_blank" rel="external"><i class="zmdi zmdi-youtube"></i></a><a href="https://www.instagram.com/escolaprotagonista/" target="_blank" rel="external"><i class="zmdi zmdi-instagram"></i></a></div>
                </div>
                <p class="copyright">ECIT José Leite de Souza © 2022</p>
            </div>
        </footer>
    </div>
    </body>
</html>
