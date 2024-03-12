<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction réussie</title>
</head>
<body>
    <h1>Nouvelle transaction</h1>
    <p>
        <strong>Cher {{Session::get('auth')['prenom']}} {{Session::get('auth')['nom']}}</strong>,<br>
        Vous venez d'effectuer un transfert depuis votre compte <em>{{$info['a']}}</em>.<br>
        Vers : 
        <br>
        <em>RIB : {{$info['vers']}}</em><br>
        <em>Montant : {{$info['montant']}} FCFA</em><br>
        <em>Votre nouveau solde : {{$info['solde']}} FCFA</em><br>
        <br>
        Cordialement,<br>
        <strong>L'equipe Gestion Finance</strong>
    </p>
</body>
</html>