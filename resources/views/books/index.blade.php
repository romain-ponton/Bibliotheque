@extends('layout')
@section('title', 'store books')

@section('body')
<h1>store books</h1>

@foreach ( $books as $book)
<div class="card" style="width: 18rem;">
    <img src="{{$book->photo}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$book->title}}</h5>
      <p class="card-text">{{$book->author}}</p>
      <p class="card-text">{{$book->nbpages}}</p>
      <p class="card-text">{{$book->resume}}</p>
      <p class="card-text">{{$book->price}}</p>
      <p class="card-text">{{$book->category_id}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
 @endforeach
@endsection

