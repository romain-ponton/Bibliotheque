@extends('admin-layout')

@section('title', 'utilisateurs')

@section('body')
    <h1 class="text-center py-4">Liste des livres </h1>
    <p>Total des livres : {{$count}}</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">nb pages</th>
                <th scope="col">Prix</th>
                <th scope="col">Photo</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->nbpages }}</td>
                    <td>{{ $book->price }}</td>
                    <td><img src="{{ asset('storage/' . $book->photo) }}" alt="Photo de couverture" width="50"></td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Etes vous sur')" type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
@endsection
