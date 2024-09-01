@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Crea il tuo viaggio</h1>
    <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div>
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        {{-- <div>
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div>
            <label for="image" class="form-label">Immagini</label>
            <input type="file" class="form-control" id="image" name="image">
        </div> --}}

        <button type="submit" class="btn btn-light">Crea il tuo viaggio</button>
    </form>
</div>

@endsection