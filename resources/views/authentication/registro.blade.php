@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@if ($flag ?? '')
    <ul><li>{{$flag}}</li><ul>
@else
    @if ($errors->any())
        <div class="aviso_erro">
            <ul> 
               @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif

<form action="/registro" method="POST">
    @csrf
    <div class="personal-info">
        Nome de Usuário:<br><input type="text" name="nome"><br>
        E-mail:<br><input type="email" name="email"><br>
        Senha:<br><input type="password" name="senha"><br>
    </div>

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
    <input type="submit" value="Cadastrar">
</form>
