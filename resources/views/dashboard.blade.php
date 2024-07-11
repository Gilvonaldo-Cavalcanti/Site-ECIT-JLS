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

            @staff
                <div class="tab-pane fade" id="staffs-panel" role="tabpanel" aria-labelledby="staffs-panel-tab">
                    <h1 class="titulos-tabelas">Gerenciar Usuários:</h1>

                    <div class="gerenciar-users">
                        <div class="flex-container"> <!-- Separar pra cara tópico de gerenciamento? -->
                            <div class="criar-users-func">
                                <h2 class="fields-tabelas">Cadastrar</h2>

                                @if (session()->has('flag-criar-usr'))
                                    <p class="msg-aviso">{{ session('flag-criar-usr') }}</p>
                                @else
                                    @if ($errors->any())
                                        <div class="aviso_erro">
                                            @foreach($errors->all() as $error)
                                                <p class="msg-aviso">{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                @endif

                                <form action="/dashboard/registrar" method="POST">
                                    @csrf

                                    <div class="user-back-info">
                                        <input type="radio" id="class1" name="classe" value="1" checked>
                                        <label for="class1">Aluno</label>

                                        @admin
                                            <input type="radio" id="class2" name="classe" value="2">
                                            <label for="class2">Professor</label>
                                            <input type="radio" id="class3" name="classe" value="3">
                                            <label for="class3">Administrador</label>
                                        @endadmin
                                    </div>

                                    <div class="personal-info">
                                        <input placeholder="Nome de Usuário" type="text" name="nome"><br>
                                        <input placeholder="E-mail" type="email" name="email"><br>
                                        <input placeholder="Senha" type="password" name="senha"><br>
                                    </div>

                                    <button type="submit">Cadastrar</button>
                                </form>
                            </div>

                            <div class="deletar-users-func">
                                <h2 class="fields-tabelas">Deletar Usuário</h2>

                                @if (session()->has('flag-del-usr'))
                                    <p class="msg-aviso">{{ session('flag-del-usr') }}</p>
                                @endif
                                <form action="/dashboard/deletar-user" method="POST">
                                    @csrf
                                    <input placeholder="Nome do Usuário" type="text" name="deletar-nome">
                                    <button type="submit">Deletar User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endstaff
        </div>
</div>
@endsection

