
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding-top: 50px; }
        .message { font-size: 24px; color: #333;  justify-content: center; }
        body{
            background: linear-gradient(to right, #025002, #0072ff);
        }
        a {
            color: black;
        }
        #message {
            color: white;
            margin-top: 100px;
        }
       
       
    </style>
</head>
<body>
<div id="container">
    <div class="message" id="message" >
        <!-- Message global pour tous les visiteurs -->
        <p>Welcome to our application!</p>

        <!-- Message pour les utilisateurs non connectés -->
      <div>
        <button class="btn btn-success" >
        <a style{ color: black;} href="{{ route('login') }}">Connexion</a>
        </button>
        <button class="btn btn-primary">
        <a  href="{{ route('register') }}">Register</a>
        </button>
      </div>
    </div>
    </div>
</body>
</html>
