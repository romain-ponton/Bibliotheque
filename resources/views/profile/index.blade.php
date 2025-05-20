@extends('layout')

@section('title', 'Profile')
@section('body')
    <h1>Bonjour {{ $user->name }}</h1>


    <h2>Mes informations</h2>
    <ul>
        <li><strong>Nom:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Date de création du compte:</strong> {{ $user->created_at->format('d/m/Y') }}</li>
        <li><strong>Date de mise à jour du compte:</strong> {{ $user->updated_at->format('d/m/Y') }}</li>

        <li><strong>Biographie:</strong> {{$user->profile->bio ?? '😢'}} </li>
        <li>
            <strong>Photo de profile:</strong>
            @if ($user->profile->profile_image != null)
                <img src="{{ asset('storage/' . $user->profile->profile_image) }}" alt="Photo de profile" style="width: 100px; height: 100px;">
            @else
                <p>Aucune photo de profile</p>
            @endif
        </li>
    </ul>



    <div class="update-bio">
        <h2>Modifier ma biographie</h2>
        <form action="{{ route('profile.update_bio', $user) }}" method="POST">
            @csrf
            @method('PUT')
            @component('components.input', ['name' => 'bio', 'label' => 'Biographie',  'value' => old('bio', $user->profile->bio)])
            @endcomponent
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

    </div>

        <div class="update-photo">
            <h2>Modifier ma photo de profile</h2>
            <form action="{{ route('profile.update_image', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @component('components.input', ['name' => 'profile_image', 'label' => 'Photo de profile', 'type' => 'file'])
                @endcomponent
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>


@endsection
