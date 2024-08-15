@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')

<img class="imagem-principal" src="img/mural.jpeg" alt="">

<div class="divisoria-colorida-governo">
    <div class="cor-1"></div>
    <div class="cor-2"></div>
    <div class="cor-3"></div>
    <div class="cor-4"></div>
    <div class="cor-5"></div>
</div>

<div class="jumbotron jumbotron-fluid">
<div class="row text-center mx-auto align-items-center">
  <div class="p-5 col">
    <h1>Nossa História</h1>
    <p>O Colégio Estadual de Monteiro, que hoje é a Escola Cidadã Integral Técnica José Leite de Souza, foi construída no ano de 1972 em um terreno doado pelo então Deputado Estadual Euvaldo da Silva Brito, que veio da iniciativa do Prefeito Jorge Rafael de Menezes e teve como diretor fundador o Fundador Dr. Antenor Campos. Atualmente o Colégio Estadual de Monteiro José leite de Souza, tem como responsável por sua gestão a Diretora Vera Paes.</p>
    <a href="/nossa-historia" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Leia mais</a>
    
  </div>
  <div class="col">
    <img class="esc-old" src="http://photos.wikimapia.org/p/00/02/86/67/99_full.jpg" alt="">
  </div>  
</div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <!-- Cards Topicos -->
  <div id="cards_landscape_wrap-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                                    <img src="img/protagonismo.jpeg" alt="" />
                                </div>
                                <div class="text-container">
                                    <h6>Protagonismo Escolar</h6>
                                    <p> O protagonismo escolar é um conceito fundamental que visa promover a participação ativa dos estudantes no processo educativo, tornando-os agentes principais de sua própria aprendizagem.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                                    <img src="img/professores_resized.jpeg" alt="" />
                                </div>
                                <div class="text-container">                                    
                                    <h6>Excelentes Profissonais</h6>
                                    <p>Gostariamos nesse momento de boas-vindas a vocês caros vistantes exaltar nossos profissionais, que se habilitam a todo momento em ensinar, cuidar e proteger seus alunos.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                                    <img src="img/computadores.jpeg" alt="" />
                                </div>

                                <div class="text-container">
                                    <h6>Ensino Técnico Diferenciado</h6>
                                   <p>Temos o ensino técnico na área de informática e música, utilizando diversas práticas diferenciadas e divertidas aos nossos alunos para aprenderem da melhor forma possivel.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <a href="">
                        <div class="card-flyer">
                            <div class="text-box">
                                <div class="image-box">
                                    <img src="img/convivencia-resized.jpeg" alt="" />
                                </div>
                                <div class="text-container">
                                    <h6>Convivência na escola</h6>
                                   <p>Acima de tudo priorizamos o cuidado com nossos alunos e tentamos criar um circulo de amizade e respeito entre alunos, preofessores e a gestão, proporcionando uma convivência harmoniosa.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


</div>
</div>

@endsection
