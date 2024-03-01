@extends('sign.layout')
@section('sign')
    <div class="login-page">
        <div class="form">
        
        <form class="login-form">
            <input type="email" placeholder="Email"/>
            <input type="password" placeholder="Mot de passe"/>
            <button>Se connecter</button>
            <p class="message">Vous n'avez pas de compte ? <a href="{{route('sinscrire')}}">Devenir client</a></p>
            <p class="message"><a href="{{route('index')}}">Retourner a la page d'accueil </a></p>
        </form>
        </div>
    </div>
@endsection