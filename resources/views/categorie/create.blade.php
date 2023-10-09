@extends('base')
@section('title','Ajout d\'une categorie')

@section('content')
<div class="container mt-4">
    <form action="{{route('categorie.store')}}" method="POST">
        @csrf
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror">
        @error('nom')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Ajouter Categorie</button>
    </form>
</div>

@endsection