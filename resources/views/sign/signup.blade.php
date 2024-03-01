@extends('sign.layout')
@section('sign')
<div class="login-page">
    <div class="form">
    
    <form class="login-form">
        <input type="text" placeholder="Prenom"/>
        <input type="text" placeholder="Nom"/>
        <input type="text" placeholder="Téléphone"/>
        <input type="email" placeholder="Email"/>
        <input type="password" placeholder="Mot de passe"/>
        <button>Se connecter</button>
        <p class="message">Vous avez deja un compte ? <a href="{{route('seconnecter')}}">Connectez-vous !</a></p>
        <p class="message"><a href="{{route('index')}}">Retourner a la page d'accueil </a></p>
    </form>
    </div>
</div>
@endsection