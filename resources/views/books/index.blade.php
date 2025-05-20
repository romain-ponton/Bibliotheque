@extends('layout')
@section('title', 'store books')


@section('body')
    <h1 class="my-4 text-center">store books</h1>

    <aside class="my-4">

        <form action="{{ route('books.index') }}" method="GET">
            <div class="form-floating mb-3">
                <input id="search" class="form-control" type="text" name="search" value="{{ request('search') }}"
                    placeholder="Recherche">

                <label for="search"> Recherche </label>
            </div>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </aside>

    @if (count($books) === 0)
       @component('components.flash', ['type' => 'danger','value' => 'Aucun livre trouvé']) @endcomponent


    @endif


    <div class="d-flex gap-4  my-4">
        @component('components.category-sidebard', ['categories' => $categories])
        @endcomponent


        <div class="d-flex flex-wrap justify-center gap-4">
            @if (count($books) > 0)
                @foreach ($books as $book)
                    <div class="card" style="width: 20rem;">
                        <img src="storage/{{ $book->photo }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->author }}</p>
                            <p class="card-text">{{ $book->price }}€</p>
                            <p class="card-text">{{ $book->category->name }}</p>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </div>



    <div class="d-flex justify-content-center">
        {{-- add pagination with categry_id query param}}
        {{-- {{ $books->appends(['category_id' => request('category_id')])->links() }} --}}
        {{ $books->withQueryString()->links() }}

    </div>
@endsection
