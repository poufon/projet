@extends('layouts.app')

@section('content')
    <h1>Résultats de la recherche</h1>

    <h2>Utilisateurs</h2>
    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach

    <h2>Produits</h2>
    @foreach ($products as $product)
        <p>{{ $product->name }}</p>
    @endforeach
@endsection
