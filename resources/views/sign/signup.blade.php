@extends('sign.layout')
@section('sign')
<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="{{route('utilisateurs.store')}}">
            @csrf
            @method('POST')
            <input name="prenom" type="text" placeholder="Prenom"/>
            <input name="nom" type="text" placeholder="Nom"/>
            <input name="telephone" type="text" placeholder="Téléphone"/>
            <input name="email" type="email" placeholder="Email"/>
            <input name="motdepasse" type="password" placeholder="Mot de passe"/>
            <button type="submit">S'inscrire</button>
            <p class="message">Vous avez deja un compte ? <a href="{{route('seconnecter')}}">Connectez-vous !</a></p>
            <p class="message"><a href="{{route('index')}}">Retourner a la page d'accueil </a></p>
        </form>
    </div>
</div>
@endsection