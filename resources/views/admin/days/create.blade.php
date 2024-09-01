@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Aggiunge una data al tuo viaggio</h1>

    <form action="{{ route('admin.days.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tour_id">Viaggio</label>
            <select class="form-control" id="tour_id" name="tour_id" required>
                @foreach($tours as $tour)
                    <option value="{{ $tour->id }}">{{ $tour->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-light">Aggiungi data</button>
    </form>

</div>

@endsection