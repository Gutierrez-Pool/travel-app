@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Modifica la data</h1>

    <form action="{{route('admin.days.update', $day->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titolo" aria-describedby="titleHelper" value="{{old('title') ?? $day->title}}">
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <small id="titleHelper" class="text-muted">Titolo, massimo 255 caratteri</small>
        </div>

        {{-- <div class="mb-4">
            <label for="description">Descrizione</label>
            <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{old('description') ?? $tour->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div> --}}
        <div class="form-group">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{old('date') ?? $day->date}}" required>
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