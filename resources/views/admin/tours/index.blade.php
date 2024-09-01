@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h3>I tuoi viaggi</h3>

    <div class="d-flex gap-5 justify-content-around">
        @foreach ($tours as $tour)
        <div class="card" style="">
            <div class="card-body">
                <h5 class="card-title">{{$tour->title}}</h5>
                <p class="card-text">{{$tour->description}}</p>
                <a href="{{route('admin.tours.show', $tour->id)}}" class="btn btn-light">Visualizza</a>
            </div>
        </div>
        @endforeach
    </div>
    

</div>

@endsection