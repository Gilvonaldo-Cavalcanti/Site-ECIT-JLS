@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('js-scripts')
<!-- JavaScript local -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            
            $(this).tab('show'); // Ativa a aba
        });
    });
</script>
@endsection

@section('content')
<div class="main-content">
    <div class="side-bar">
        <div class="user-infos">
            <img src="img/perfil.png" class="usr-photo">
            <div class="personal">
                <strong>
                    <h6>
                        @php
                            echo "{$_SESSION['user_personal']['nome']}";
                        @endphp
                    </h6>
                </strong>

                @admin
                    <p>Administrador</p>
                @endadmin

                @professor
                    <p>Professor</p>
                @endprofessor

                @aluno
                    <p>Aluno</p>
                @endaluno
            </div>
        </div>

        <div class="nav flex-column nav-pills dash-options" id="tables" role="tablist" aria-orientation="vertical">
            <hr>
            <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            <a class="nav-link" id="agd-acolhimento-tab" data-toggle="pill" href="#agd-acolhimento" role="tab" aria-controls="agd-acolhimento" aria-selected="false">Agenda de Acolhimento</a>
            <a class="nav-link" id="boletims-tab" data-toggle="pill" href="#boletims" role="tab" aria-controls="boletims" aria-selected="false">Consulta de Boletims</a>
            <a class="nav-link" id="cardapio-tab" data-toggle="pill" href="#cardapio" role="tab" aria-controls="cardapio" aria-selected="false">Cardápio do Dia</a>
            <a class="nav-link" id="mural-avisos-tab" data-toggle="pill" href="#avisos" role="tab" aria-controls="avisos" aria-selected="false">Mural de Avisos</a>
            <a class="nav-link" id="horarios-tab" data-toggle="pill" href="#horarios" role="tab" aria-controls="horario" aria-selected="false">Horário de Aulas</a>
            <hr>
            @staff
                <a class="nav-link" id="staffs-panel-tab" data-toggle="pill" href="#staffs-panel" role="tab" aria-controls="staffs-panel" aria-selected="false">Painel de Funcionários</a>
            @endstaff
        </div>
    </div>

    <div class="tab-content" id="tabcontent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h1>Olá, {{ $_SESSION['user_personal']['nome'] }}!</h1>
        </div>
        <div class="tab-pane fade" id="agd-acolhimento" role="tabpanel" aria-labelledby="agd-acolhimento-tab">...</div>
        <div class="tab-pane fade" id="boletims" role="tabpanel" aria-labelledby="boletims-tab">...</div>

        <div class="tab-pane fade" id="cardapio" role="tabpanel" aria-labelledby="cardapio-tab">...</div>

        <div class="tab-pane fade" id="avisos" role="tabpanel" aria-labelledby="mural-avisos-tab">
             @include('dashboard.avisos')
        </div>

        <div class="tab-pane fade" id="horarios" role="tabpanel" aria-labelledby="horarios-tab">...</div>
        @include('dashboard.painel-de-func')
    </div>
</div>
@endsection

