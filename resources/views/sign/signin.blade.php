@extends('sign.layout')
@section('sign')
    <div class="login-page">
        @if (Session::has('success'))
            <div class="alert alert-success text-center">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger text-center">{{Session::get('error')}}</div>
        @endif
        <div class="form">
        <form class="login-form" method="POST" action="{{route('utilisateurs.login')}}">
            @csrf
            <input name="email" type="email" placeholder="Email"/>
            <input name="motdepasse" type="password" placeholder="Mot de passe"/>
            <button>Se connecter</button>
            <p class="message">Vous n'avez pas de compte ? <a href="{{route('sinscrire')}}">Devenir client</a></p>
            <p class="message"><a href="{{route('index')}}">Retourner a la page d'accueil </a></p>
        </form>
        </div>
    </div>
@endsection

@section('title')
    Se connecter
@endsection