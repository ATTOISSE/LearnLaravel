@extends('base')

@section('title','liste des produits')

@section('content')
<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <table class="table table-bordered">
        <th>N°</th>
        <th>Libelle</th>
        <th>Prix</th>
        <th>Quantite</th>
        <th>Categorie</th>
        <th>Action</th>
        @foreach($produits as $produit )
        <tr>
            <td>{{$produit->id}}</td>
            <td>{{$produit->libelle}}</td>
            <td>{{$produit->prix}}</td>
            <td>{{$produit->quantite}}</td>
            <td>{{$produit->categorie->nom}}</td>
            <td>
                <a href="{{route('produit.edit',['id' => $produit->id])}}" class="btn btn-warning">Modifier</a>
                <a href="{{route('produit.destory',['id' => $produit->id])}}"
                    onclick="return confirm('etes-vous sûr de vouloir supprimer ?')"
                    class="btn btn-danger">Supprimer</a>
            </td>

        </tr>
        @endforeach
    </table>
</div>

@endsection