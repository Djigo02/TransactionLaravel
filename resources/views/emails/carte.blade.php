<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dépot réussie</title>
</head>
<body>
    <h1>Vous venez de creer votre carte virtuelle</h1>
    <p>
        <strong>Cher {{$info['nom']}} {{$info['prenom']}}</strong>,<br>
        Vous venez de creer votre carte virtuelle :<br>
        <br>
        <em>Montant : {{$solde}} FCFA</em><br>
        <em>Votre numero de carte : {{$numero}} </em><br>
        <em>Votre CVV : {{$cvv}} </em><br>
        <em>Date d'expiration : {{$dateexp}} </em><br>
        <br>
        Cordialement,<br>
        <strong>L'equipe Gestion Finance</strong>
    </p>
</body>
</html>