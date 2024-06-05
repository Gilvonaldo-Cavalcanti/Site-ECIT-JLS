@extends('layouts.main')

<form action="/login" method="POST">
    @csrf

    E-mail:<br><input type="email" name="email"><br>
    Senha:<br><input type="password" name="senha"><br>
    <input type="submit" value="Login">

@if ($flag ?? '')
    <pre>{{$flag}}</pre>
@endif
</form>
