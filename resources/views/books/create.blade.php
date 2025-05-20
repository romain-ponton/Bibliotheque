@extends('layout')
@section('title', 'ajouter un livre')

@section('body')

<h1 class="text-center py-4">Ajouter un livre</h1>
<form action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    @component('components.input', ['name' => 'title', 'label' => 'Titre', 'value' => old('title')])
    @endcomponent

    @component('components.input', ['name' => 'author', 'label' => 'Auteur', 'value' => old('author')])
    @endcomponent

    @component('components.input', ['name' => 'nbpages', 'label' => 'Nombre de pages', 'type' => 'number', 'value' => old('nbpages')])
    @endcomponent

    @component('components.input', ['name' => 'price', 'label' => 'Prix', 'value' => old('price')])
    @endcomponent

    @component('components.input', ['name' => 'photo', 'label' => 'Photo de couverture', 'type' => 'file', 'value' => old('photo')])
    @endcomponent

    @component('components.input', ['name' => 'resume', 'label' => 'Résumé', 'type' => 'textarea',  'value' => old('resume')])
    @endcomponent

 <div class="form-group">
    <label for="category">Catégorie</label>
    <select class="form-select" name="category_id" id="category">
        @foreach($categories as $category)
         <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
 </div>

    <button type="submit" class="btn btn-primary my-2">Ajouter le livre</button>
</form>
@endsection
