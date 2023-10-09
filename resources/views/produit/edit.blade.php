@extends('base')

@section('title','Modificaton d\'un produit')

@section('content')

<div class="container mt-5 col-md-8">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Modificaton d'un Produit</h3>
        </div>
        <div class="card-body">
            <form action="{{route('produit.update',['id'=> $produit->id])}}" method="POST">
                @csrf
                <label for="">Libelle</label>
                <input type="text" name="libelle" value="{{$produit->libelle}}"
                    class="form-control @error('libelle') is-invalid @enderror">
                <div class="text-danger">
                    @error('libelle')
                    {{$message}}
                    @enderror
                </div>
                <label for="">Prix</label>
                <input type="number" name="prix" value="{{$produit->prix}}"
                    class="form-control @error('prix') is-invalid @enderror">
                <div class="text-danger">
                    @error('prix')
                    {{$message}}
                    @enderror
                </div>
                <label for="">Quantite</label>
                <input type="number" name="quantite" value="{{$produit->quantite}}"
                    class="form-control @error('quantite') is-invalid @enderror">
                <div class="text-danger">
                    @error('quantite')
                    {{$message}}
                    @enderror
                </div>
                <label for="">Categorie</label>
                <select name="categorie_id" id="categorie" value="{{$produit->categorie_id}}"
                    class="form-control @error('categorie_id') is-invalid @enderror">
                    <option value="">Ajouter une categorie</option>
                    @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                    @endforeach
                </select>
                <div class="text-danger">
                    @error('categorie_id')
                    {{$message}}
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Ajouter Produit</button>
            </form>
        </div>
    </div>
</div>

@endsection