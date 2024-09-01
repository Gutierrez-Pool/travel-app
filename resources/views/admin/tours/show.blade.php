@extends('layouts.app')

@section('content')

{{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    const tourId = {{$tour->id}};
  });
</script> --}}

<div class="container py-2">

  <h4 class="pb-3">Il tuo viaggio</h4>

  <div class="d-flex row gap-4 pb-4">

    <div class="d-flex justify-content-between">
      <h1 class="card-title">{{$tour->title}}</h1>
      <div class="">
        {{-- Buttons --}}
        <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn btn-warning">
          <i class="fas fa-edit"></i>
        </a>
    
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="far fa-minus-square"></i>
          </button>
      
          <!-- Button trigger modal -->
          
          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
        
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina il viaggio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <div class="modal-body">
                    Sei sicuro di voler eliminare il viaggio?
                </div>
        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{route('admin.tours.destroy', $tour)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

    <p class="card-text">{{$tour->description}}</p>
  
    <div class="card" style="width: 18rem;">
      <div class="card-body d-flex justify-content-between">
        <h4 class="card-title">Date</h4>
        {{-- <h6 class="card-subtitle mb-2 text-body-secondary">Aggiunge una data al tuo viaggio</h6> --}}
        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
        <div>
          <a href="{{ route('admin.days.create', $tour->id) }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
          </a>
          <a href="{{ route('admin.days.index', $tour->id) }}" class="btn btn-light">
            <i class="fas fa-eye"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection