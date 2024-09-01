@extends('layouts.app')

@section('content')
<section>

    <div class="container py-3">
        <h1>Le mie tappe</h1>

        {{-- @dd($stops) --}}

        @foreach ($stops as $stop)
        <div class="py-4">
            <div class="d-flex justify-content-between">
                <h4>{{$stop->title}}</h4>
                <a href="{{ route('admin.stops.show', $stop->id) }}" class="btn btn-light">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
            <small>{{$stop->address}}</small>
            <p>{{$stop->description}}</p>
        </div>
        @endforeach
    </div>


</section>
@endsection
