@extends('base')

@section('title','connexion')

@section('content')

<div class="container mt-4">
    <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Se connecter</button>
    </form>
</div>

@endsection