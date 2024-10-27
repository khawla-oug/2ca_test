<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; }
        .message { font-size: 24px; color: #333; }
    </style>
</head>
<body>
    <div class="message">
        <!-- Message global pour tous les visiteurs -->
        <p>Welcome to our application!</p>

        <!-- Message spécifique pour chaque type d'utilisateur authentifié -->
        @auth
            @if(auth()->user()->hasRole('admin'))
                <p>Welcome, Admin! You have full access to the system.</p>
            @elseif(auth()->user()->hasRole('author'))
                <p>Welcome, Author! You can manage your posts.</p>
            @else
                <p>Welcome, Visitor! Feel free to explore the published posts.</p>
            @endif
        @endauth

        <!-- Message pour les utilisateurs non connectés -->
        @guest
            <p>Please <a href="{{ route('login') }}">log in</a> to access more features.</p>
        @endguest
    </div>
</body>
</html>
