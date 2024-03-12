<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription réussie</title>
</head>
<body>
    <h1>Vous venez de creer un compte {{$compte}}</h1>
    <p>
        <strong>Cher {{Session::get('auth')['prenom']}} {{Session::get('auth')['nom']}}</strong>,<br>

    Nous sommes ravis de vous accueillir parmi nous ! 🎉 Votre compte {{$compte}} a été créé avec succès.<br>

    Désormais, vous pouvez accéder à toutes les fonctionnalités de notre plateforme en utilisant les informations de connexion suivantes :
    <br>
    <em>RIB : {{$rib}}</em><br>
    <br>
    Cordialement,<br>
    <strong>L'equipe Gestion Finance</strong>
    </p>
</body>
</html>