@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Benvenuto {{$user->name}}</h1>

    <h5>I tuoi viaggi</h5>

    <a href="{{ route('admin.tours.create') }}" class="btn btn-light">Aggiungi un viaggio</a>
    <a href="{{ route('admin.tours.index') }}" class="btn btn-light">Visualizza i viaggi</a>

</div>

@endsection