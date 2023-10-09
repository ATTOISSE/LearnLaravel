@extends('base')
@section('title','Modification d\'une categorie')

@section('content')
<div class="container mt-4">
    <form action="{{route('categorie.update',['id' => $categorie->id])}}" method="POST">
        @csrf
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{$categorie->nom}}"
            class="form-control @error('nom') is-invalid @enderror">
        @error('nom')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <button type=" submit" class="btn btn-warning mt-3">Modifier Categorie</button>
    </form>
</div>

@endsection