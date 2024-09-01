@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Modifica tappa</h1>

    <form action="{{route('admin.stops.update', $stop->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titolo" aria-describedby="titleHelper" value="{{old('title') ?? $stop->title}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <small id="titleHelper" class="text-muted">Titolo della tappa, massimo 255 caratteri</small>
        </div>

        <div class="mb-4">
            <label for="description">Descrizione</label>
            <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{old('description') ?? $stop->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address">Luogo</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" aria-describedby="titleHelper" value="{{old('address') ?? $stop->address}}">
            @error('address')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <small id="titleHelper" class="text-muted">Titolo della tappa, massimo 255 caratteri</small>
        </div>

        <div class="mb-4 col-12 col-sm-6">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{old('latitude') ?? $stop->latitude}}" required>
        </div>
        <div class="mb-4 col-12 col-sm-6">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{old('longitude') ?? $stop->longitude}}" required>
        </div>

        {{-- <div class="mb-4">
            <img src="{{asset('storage/' . $post->cover_image)}}" alt="Copertina immagine">
            <label for="cover_image">Immagine di copertina</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image">
            @error('cover_image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div> --}}
    

        <button class="btn btn-primary">Modifica</button>
    
    </form>

</div>

@endsection