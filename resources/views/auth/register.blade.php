
@extends('layout')


@section('title', 'inscription')


@section('body')
<h1 style="text-align : center">Inscription</h1>

<div class="container" style="width: 70%; justify-content: center;">
<form action="" method="post">
    @csrf

    @component('components.input',
                    ['name' => 'name', 'label' => 'Nom et prenom', 'value' => old('name')])
    @endcomponent

    @component('components.input',
    ['name' => 'email', 'label' => 'Votre email', 'value' => old('email'), 'type' => 'email'])
    @endcomponent

    @component('components.input',
    ['name' => 'password', 'label' => 'Votre mot de passe', 'value' => old('password'), 'type' => 'password'])
    @endcomponent


    <button type="submit" class="btn btn-primary">Inscription</button>
</form>

</div>

@endsection
