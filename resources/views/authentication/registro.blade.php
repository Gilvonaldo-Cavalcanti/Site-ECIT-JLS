@extends('layouts.main')

<form action="/registro" method="POST">
    @csrf

    Nome de Usuário:<br><input type="text" name="nome"><br>
    E-mail:<br><input type="email" name="email"><br>
    Senha:<br><input type="password" name="senha"><br>
    <input type="submit" value="Cadastrar">
</form>

@if ($flag ?? '')
    <pre>{{$flag}}</pre>
@endif

