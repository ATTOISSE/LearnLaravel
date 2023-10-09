@extends('base')

@section('title','liste des categorie')

@section('content')

@auth
{{Illuminate\Support\Facades\Auth::user()->name}}
<form action="{{route('auth.logout')}}" method="post">
    @method('delete')
    @csrf
    <button class="btn btn-dark">Se deconnecter</button>
</form>
@endauth
@guest
<a href="{{route('auth.login')}}">Se connecter</a>
@endguest
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
@foreach($categorie as $cat)
<h5>{{$cat->nom}}</h5>

@endforeach

@endsection