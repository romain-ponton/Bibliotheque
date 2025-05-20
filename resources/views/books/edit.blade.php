@extends('layout')
@section('title', 'Modifier un livre')

@section('body')

    <h1 class="text-center py-4">{{ $book->title }}</h1>

    <form action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @component('components.input', ['name' => 'title', 'label' => 'Titre', 'value' => $book->title])
        @endcomponent

        @component('components.input', ['name' => 'author', 'label' => 'Auteur', 'value' => $book->author])
        @endcomponent

        @component('components.input', ['name' => 'nbpages', 'label' => 'Nombre de pages', 'value' => $book->nbpages])
        @endcomponent

        @component('components.input', [
            'name' => 'resume',
            'label' => 'Résumé',
            'type' => 'textarea',
            'value' => $book->resume,
        ])
        @endcomponent

        @component('components.input', ['name' => 'price', 'label' => 'Prix', 'value' => $book->price])
        @endcomponent

        @component('components.input', [
            'name' => 'photo',
            'label' => 'Photo de couverture',
            'type' => 'file',
            'value' => old('photo'),
            'required' => false,
        ])
        @endcomponent
        <div class="form-group">
            <label for="category">Catégorie</label>
            <select class="form-select" name="category_id" id="category">
                @foreach ($categories as $category)
                    <option {{ $category->id === $book->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Modifier le livre</button>
    </form>
@endsection
{{-- layout.blade.php
<h1>{{ $book->title }}</h1>
<p>{{ $book->description }}</p>
<p>Auteur: {{ $book->author->name }}</p>
<h2>Livres similaires</h2>
@foreach ($relatedBooks as $relatedBook)
    <a href="{{ url('/books/' . $relatedBook->id) }}">{{ $relatedBook->title }}</a>
@endforeach

<form action="{{ url('/books/' . $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $book->title }}" required>
    <textarea name="description" required>{{ $book->description }}</textarea>
    <button type="submit">Mettre à jour</button>
</form>

<form action="{{ url('/books/' . $book->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>
 --}}
