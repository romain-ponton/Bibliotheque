@extends('layout')
@section('title', 'connexion')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@section('body')
<h1 style="text-align : center">Connexion</h1>
<div class="container" style="width: 70%; justify-content: center;">

<form action="" method="post">
    @csrf

@component('components.input',
    ['name' => 'email', 'label' => 'Votre email', 'value' => old('email'), 'type' => 'email'])
    @endcomponent

    @component('components.input',
    ['name' => 'password', 'label' => 'Votre mot de passe', 'value' => old('password'), 'type' => 'password'])
    @endcomponent

    <button type="submit" class="btn btn-primary">connexion</button>
    <span>Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous</a></span>



</form>
</div>

@endsection


