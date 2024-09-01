@extends('layouts.app')

@section('content')
<section>

    <div class="container">
        <h1>I miei giorni</h1>

        @foreach ($days as $day)
        <div class="d-flex p-3 gap-3 align-items-center">
            <div class="fs-4">{{$day->title}} ~ {{$day->date}}</div>
            {{-- <div>{{$day->tour_id}}</div> --}}
    
            <a href="{{ route('admin.days.show', $day->id) }}" class="btn btn-light">
                <i class="fas fa-eye"></i>
            </a>
        </div>
        @endforeach
    </div>


</section>
@endsection
