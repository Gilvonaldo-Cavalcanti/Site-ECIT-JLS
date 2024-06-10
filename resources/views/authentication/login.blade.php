@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@if ($flag_indv ?? '')
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

<form action="/login" method="POST">
    @csrf

    E-mail:<br><input type="email" name="email"><br>
    Senha:<br><input type="password" name="senha"><br>
    <input type="submit" value="Login">
</form>
