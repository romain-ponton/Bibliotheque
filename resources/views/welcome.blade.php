@extends('layout')
@section('title', 'welcome')

@section('body')
<h1>welcome / Bienvenue</h1>



<div class="content-container">
<div class="image-container">
    <img src="https://media.istockphoto.com/id/1235240586/fr/photo/bibliothèque-étagères-avec-des-livres-et-des-manuels-concept-dapprentissage-et-déducation.jpg?s=612x612&w=0&k=20&c=Cwf7JgioW3L_ajuOv4vBld_kUupTZsMd8ItYt4PXr6s=" alt="Description de l'image">
    </div>
    <div class="text-container">
        <p>
            Bienvenue sur MyBiblio, un sanctuaire littéraire où les pages prennent vie et les histoires vous transportent au-delà de l'imaginable. Plongez dans un univers où le fantastique côtoie l'horreur, où chaque livre est une porte vers des mondes inexplorés. Laissez-vous envoûter par des récits qui dansent entre les ombres et la lumière, où chaque mot est une invitation à l'évasion.
        </p>
        <p>
            Chez MyBiblio, l'achat de livres en ligne devient une aventure poétique, une quête de trésors littéraires qui sauront captiver votre âme et nourrir votre esprit. Que vous soyez en quête de frissons ou de merveilleux, notre collection est une mosaïque d'émotions, un voyage sensoriel à travers les genres.
        </p>
        <p>
            Entrez dans notre bibliothèque virtuelle et laissez la magie des mots vous guider vers des horizons insoupçonnés. Bienvenue dans un monde où chaque page tournée est une nouvelle épopée.
        </p>
    </div>
</div>



<h2 class="py-2">Les derniers livres ajoutés</h2>
<div class="d-flex flex-wrap justify-content-center gap-4">
    @foreach ($books as $book)
    <div class="card" style="width: 25rem;">
        <img src="storage/{{ $book->photo }}" class="card-img-top" alt="...">
        <div class="card-body">

            <h5 title="{{$book->title}}" class="card-title">{{ Str::limit($book->title, 30) }}</h5>
            <a href="{{route('books.show', $book)}}" class="btn btn-primary">Detail</a>
        </div>
    </div>
    @endforeach
</div>



@endsection


