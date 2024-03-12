<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dépot réussie</title>
</head>
<body>
    <h1>Vous venez de recevoir un depot</h1>
    <p>
        <strong>Cher {{$info['nom']}} {{$info['prenom']}}</strong>,<br>
        Vous venez de recevoir un depot sur votre compte <em>{{$info['rib']}}</em>.<br>
        <br>
        <em>Montant : {{$info['montant']}} FCFA</em><br>
        <em>Votre nouveau solde : {{$info['solde']}} FCFA</em><br>
        <br>
        Cordialement,<br>
        <strong>L'equipe Gestion Finance</strong>
    </p>
</body>
</html>