@extends('layouts.app')

@section('content')
<section>

    <div class="container py-2">

        <h1>{{$stop->title}}</h1>

        <div class="pb-4">
            <p>{{$stop->address}}</p>
            
            <p>{{$stop->description}}</p>

            {{-- Buttons --}}
            <div>
              <a href="{{ route('admin.stops.edit', $stop->id) }}" class="btn btn-warning">Modifica</a>
          
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Elimina
                </button>
            
                <!-- Button trigger modal -->
                
                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
              
                      <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina la tappa</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
              
                      <div class="modal-body">
                          Sei sicuro di voler eliminare la tappa?
                      </div>
              
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                          <form action="{{route('admin.days.destroy', $stop->id)}}" method="POST">
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
    </div>

</section>
@endsection