@extends('layouts.main')

@section('title', 'ECIT José Leite de Souza')

@section('content')

<div class="login-page">
<div class="submit-login">
    <h2>Log-In</h2>
    
    <form action="/login" method="POST">
        @csrf
        @if ($flag ?? '')
            <p>{{$flag}}</p>
        @else
            @if ($errors->any())
                <div class="aviso_erro">
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                </div>
            @endif
        @endif
   
        <input placeholder="Endereço E-mail" type="email" name="email">
        <input placeholder="Senha"type="password" name="senha">
        <button type="submit">Log-In</button>
    </form>
</div>
</div>

@endsection
