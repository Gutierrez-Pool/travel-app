@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Aggiungi una tappa al tuo viaggio</h1>

    <form action="{{ route('admin.stops.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4 col-12 col-sm-6">
            <label for="day_id">Giorno</label>
            <select class="form-control" id="day_id" name="day_id" required>
                @foreach($days as $day)
                    <option value="{{ $day->id }}">{{ $day->title }} ~ {{ $day->date }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4 col-12 col-sm-6">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-4 col-12 col-sm-6">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        
        <div class="mb-4 col-12 col-sm-6" id="address-box">
            <label for="address" class="fw-bold form-label">Luogo</span></label>
            <input type="text" class="form-control" id="address" name="address" value="" onkeyup="handleKeyUp()">
            <div class="auto-complete-box hide">
              <ul id="suggested-roads-list" class="list-group">
              </ul>
            </div>
        </div>
        <div class="mb-4 col-12 col-sm-6">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" required>
        </div>
        <div class="mb-4 col-12 col-sm-6">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" required>
        </div>
        <button type="submit" class="btn btn-light">Aggiungi tappa</button>
    </form>

</div>

@endsection

<script>
    let streets = [];

function handleKeyUp(event) {

  // Lista delle vie suggerite
  const UlEle = document.getElementById('suggested-roads-list');
  UlEle.innerHTML = '';

  // Valore del campo dell'indirizzo
  const input = document.getElementById('address').value;

  // Controllo sull'input che non sia vuoto
  if (input.trim() != '') {
      // Il bottone viene disattivato ogni qual volta si scrivono o cancellano caratteri
      document.querySelector('#btn-submit').disabled = true;

      axios.get('http://127.0.0.1:8000/api/autocomplete-address?query=' + input)
          .then(response => {
              // Inserita l'array dei risultati in un array locale
              streets = response.data.result.results;
              console.log(streets);
          })
          .catch(error => {
              console.error(error);
          });
  } else {
      document.querySelector('.auto-complete-box').classList.add('hide');

      // controlla che tutti i campi siano stati compilati o meno e disattiva e attiva il pulsate in relazione alla scansione
      checkRequiredFields()
  }

  if (streets.length != 0) {
      for (let i = 0; i < streets.length; i++) {
          const liEl = document.createElement('li');
          const divEl = document.createElement('div');
          divEl.innerText = streets[i].address.freeformAddress + ', ' + streets[i].address.country;
          liEl.append(divEl);
          liEl.classList.add('list-group-item', 'list-group-item-action');
          UlEle.append(liEl);

          liEl.addEventListener('click', function () {
              flag = true;
              // Viene inserito la via scelta nella casella dell'indirizzo
              document.getElementById('address').value = liEl.innerText;

              // Il menu viene nascosto
              document.querySelector('.auto-complete-box').classList.add('hide');
              
              // controlla che tutti i campi siano stati compilati o meno e disattiva e attiva il pulsate in relazione alla scansione
              checkRequiredFields()
          });
      }
      document.querySelector('.auto-complete-box').classList.remove('hide');
  } else {
      document.querySelector('.auto-complete-box').classList.add('hide');
      
      // controlla che tutti i campi siano stati compilati o meno e disattiva e attiva il pulsate in relazione alla scansione
      checkRequiredFields()
  }
}
</script>