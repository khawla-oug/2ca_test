<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
            <li><a href="{{ route('categories.index') }}">Catégories</a></li>
            @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; cursor: pointer; color: white; margin-left: 0px;">Se déconnecter</button>
    </form>            @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Inscription</a></li>
            @endauth
        </ul>
    </nav>

    <main>
        @yield('content')
        @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; color: #333; cursor: pointer;">Se déconnecter</button>
    </form>
@else
    <a href="{{ route('login') }}">Connexion</a>
@endif

    </main>
</body>
</html>