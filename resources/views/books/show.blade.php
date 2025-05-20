@extends('layout')
@section('title', 'store books')

@section('body')
    <h1 class="text-center py-4">{{ $book->title }}</h1>

    <div class="d-flex flex-wrap justify-center gap-4">


        <img src="/storage/{{ $book->photo }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">{{ $book->author }}</p>
            <p class="card-text">{{ $book->price }}</p>
            <p class="card-text">{{ $book->category->name }}</p>
            <p class="card-text">{{ $book->resume }}</p>


            {{-- action add edit button ans delete form --}}


            <h5 class="card-title py-4">Action</h5>
            @can('update', $book)
                <a href="{{ route('books.edit', $book) }}" class="text-warning">Modifier</a>
            @endcan
            @can('delete', $book)
                <form action="{{ route('books.destroy', $book) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Etes vous sur de vouloir supprimer le livre ?')" type="submit" class=" btn btn-outline-danger">Supprimer</button>
                </form>
            @endcan
            <a href="{{ route('books.index') }}" class="text-secondary">Retour</a></td>


            <h5 class="card-title py-4">Livres similaires</h5>

            <div class="d-flex flex-wrap justify-center gap-4">
                @foreach ($book->relatedBooks as $relatedBook)
                    <div class="card" style="width: 25rem;">
                        <img src="/storage/{{ $relatedBook->photo }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $relatedBook->title }}</h5>
                            <p class="card-text">{{ $relatedBook->author }}</p>
                            <a href="{{ route('books.show', $relatedBook) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>


        @endsection
