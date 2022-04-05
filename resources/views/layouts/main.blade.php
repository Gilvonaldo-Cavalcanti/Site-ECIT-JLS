<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" href="img/logo-jls.png" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('site/style.css') }}" >
        <!-- CSS local -->
        <link rel="stylesheet" href="/css/style.css" />
        <!-- Material Design Iconic Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
  </head>

  <body>
        <header>
            <div class="nav">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <div class="nav-title">
                    <img id="logo" src="img/logo-jls.png" alt="logo">
                </div>
            </div>
            <div class="nav-btn">
                <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
                </label>
            </div>
            
            <div class="nav-links">
                <a href="..." target="_blank">Institucional</a>
                <a href="..." target="_blank">Notícias</a>
                <a href="..." target="_blank">Blog</a>
                <a href="..." target="_blank">Eventos</a>
                <a href="..." target="_blank">Nossa História</a>
                <a href="..." target="_blank">Contato</a>
                
                <a id="cadastrar" href="..." target="_blank">Cadastrar</a>
                <a id="entrar" href="..." target="_blank">Entrar</a>
                
            </div>
            </div>
        </header>

        <script src="/js/app.js"></script>

        <script src="{{ asset('site/jquery.js') }}"></script>

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
        
        <h3>Teste</h3>

        
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
      <div class="chat-logs">
       
      </div><!--chat-log -->
    </div>
    <div class="chat-input">      
      <form>
        <input type="text" id="chat-input" placeholder="Enviar uma mensagem..."/>
      <button type="submit" class="chat-submit" id="chat-submit"><i class="zmdi zmdi-mail-send"></i></button>
      </form>      
    </div>
  </div>
  
</div>

  <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>

    <script src="js/app.js"></script>

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
                            <li><a href="#">Equipe de Desenvolvimento do Site</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Institucional</h3>
                        <p>Escola Integral Técnica José Leite de Souza oferece cursos técnicos, integrados ao ensino médio, de Manutenção e Suporte em Informática e Instrumento Musical.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="zmdi zmdi-facebook"></i></a><a href="#"><i class="zmdi zmdi-twitter"></i></a><a href="#"><i class="zmdi zmdi-youtube"></i></a><a href="#"><i class="zmdi zmdi-linkedin"></i></a></div>
                </div>
                <p class="copyright">ECIT José Leite de Souza © 2022</p>
            </div>
        </footer>
    </div>
    </body>
</html>