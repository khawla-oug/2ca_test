@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="register-container">
    <h1>Inscription</h1>
    
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <label for="password_confirmation">Confirmez le mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button class="btn btn-primary" type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
</div>
@endsection
