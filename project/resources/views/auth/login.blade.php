@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <h1>Connexion</h1>
    
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore inscrit ? <a href="{{ route('register') }}">Créer un compte</a></p>
</div>
@endsection
