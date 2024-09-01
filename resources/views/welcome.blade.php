@extends('layouts.app')
@section('content')

<div class="jumbotron mb-4 rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
            Benvenuto a TravelApp
        </h1>

        <p class="col-md-8 fs-4">
            Crea una viaggio e organiza le diverse tappe.
        </p>

        {{-- <div class="Prova">
            @foreach ($tours as $tour)
            <div class="card d-flex justify-content-around gap-5">
                <div class="card-body">
                <h2 class="card-title">{{$tour->title}}</h2>
                <p class="card-text">{{$tour->description}}</p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample{{ $tour->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $tour->id }}">
                    Visualizza
                </a>
                </div>
            </div>
    
            <div class="collapse" id="collapseExample{{ $tour->id }}">
                <h4>Giorni per {{ $tour->title }}</h4>
                @foreach ($days as $day)
                    @if ($day->tour_id === $tour->id)
                        <div class="d-flex p-3 gap-3 align-items-center">
                            <p class="">{{$day->title}} ~ {{$day->date}}</p>
                            <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample{{ $day->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $day->id }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    @endif
    
                    <div class="collapse" id="collapseExample{{ $day->id }}">
                        <h4>Tappe per {{ $day->title }}</h4>
                        @foreach ($stops as $stop)
                            @if ($stop->day_id === $day->id)
                                <div class="d-flex p-3 gap-3 align-items-center">
                                    <div class="">{{$stop->title}}</div>
                                    <small>{{$stop->address}}</small>
                                    <p class="card-text">{{$stop->description}}</p>
                                    <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample{{ $stop->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $stop->id }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
            @endforeach
        </div> --}}

        @foreach ($tours as $tour)
            <div class="card d-flex justify-content-around gap-5 mb-3">
                <div class="card-body">
                    <h2 class="card-title">{{$tour->title}}</h2>
                    <p class="card-text">{{$tour->description}}</p>
                    <div class="d-flex">
                        <div class="d-flex col-1 justify-content-start">
                            <h3 class="text-center pb-1">Date:</h3>
                        </div>

                        <div class="d-flex col gap-5 align-items-center">
                            @foreach ($days as $day)
                                @if ($day->tour_id === $tour->id)
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseDay{{ $day->id }}" role="button" aria-expanded="false" aria-controls="collapseDay{{ $day->id }}">
                                    {{ $day->date }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        <div class="d-flex gap-5 pb-4">
            @foreach ($days as $day)
                    <div class="collapse" id="collapseDay{{ $day->id }}">
                        <div class="text-center">
                            <small>{{ $day->date }}</small>
                            <h1 class="">{{ $day->title }}</h1>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            @foreach ($stops as $stop)
                                @if ($stop->day_id === $day->id)
                                <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseStop{{ $stop->id }}" role="button" aria-expanded="false" aria-controls="collapseStop{{ $stop->id }}">
                                    {{ $stop->title }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
            @endforeach
        </div>

        @foreach ($stops as $stop)
                    <div class="collapse" id="collapseStop{{ $stop->id }}">
                        <div class="position-relative">
                            <h3 class="">{{ $stop->title }}</h3>
                            <small>{{ $stop->address }}</small>
                            <p>{{ $stop->description }}</p>
                            <div class="position-absolute top-0 end-0">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseStop{{ $stop->id }}" role="button" aria-expanded="false" aria-controls="collapseStop{{ $stop->id }}">
                                    <i class="fas fa-times-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        @endforeach
    </div>
</div>

@endsection