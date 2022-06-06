@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')





<div class="p-5 pb-5 conteudo-hist">


<h2>Lorem sed nisi viverra?</h2>

<p> A Escola Cidadã Integral Técnica José Leite de Souza dispõe de um Regimento Interno para atender as peculiaridades de sua estrutura, organização e funcionamento fundamentado na LDB, na Legislação de Ensino, nas Orientações e Diretrizes Educacionais do Programa de Escola Cidadã Integral e da Educação Profissional para o trabalho (EPT), implementadas pela Secretaria de Estado da Educação (SEE/PB), através da Gerência Executiva do Ensino Médio e Educação Profissional (GEEMEP/SEE/PB) que orienta e fiscaliza pedagogicamente e administrativamente as ações executadas nesta Unidade de Ensino, além do respaldo executado pelo Conselho Escolar atuante e Participativo.</p>

<p>Duis scelerisque massa vel felis cursus lobortis. Maecenas interdum sapien sed sollicitudin eleifend. Fusce elementum augue ut pellentesque pellentesque. Suspendisse tristique tempus lacinia. Mauris ut lacinia nisl, vel volutpat augue. Morbi sit amet ipsum tincidunt, feugiat est in, vulputate sem. Aenean ultrices mi dolor, vel fermentum urna posuere vitae. Nullam et turpis blandit, aliquet eros sit amet, tempus augue. Aenean bibendum risus in quam pulvinar malesuada. Vivamus sed maximus tellus, nec suscipit felis. Etiam fringilla arcu nec egestas tincidunt. Pellentesque quam enim, mattis nec quam id, mollis consequat purus. Pellentesque sodales quis enim in feugiat.</p>

<ul>
    <li>Varius dignissim;</li>
    <li>Sed tincidunt bibendum;</li>
    <li>Quisque sit amet odio;</li>
    <li>Aenean varius sagittis nunc.</li>
</ul>

    <div class="container mt-5">
        <h2 id="localizacao">Nossa Localização</h2>
        <div id="map"></div>
    </div>
  
    <script type="text/javascript">
        function initMap() {

          const myLatLng = { lat: -7.893678505349422, lng: -37.131173245549924 };
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: myLatLng,
          });
  
          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "ECIT José Leite de Souza",
          });
        }
  
        window.initMap = initMap;
    </script>
  
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
  
      </div>
@endsection
