<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use App\Http\Requests\StoreStopRequest;
use App\Models\Day;
use App\Models\Tour;
use Illuminate\Http\Request;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $day = Day::findOrFail($id);
        
        $stops = $day->stops;

        return view('admin.stops.index', compact('stops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = Day::all();

        return view('admin.stops.create', compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStopRequest $request)
    {   
        $days = Day::all();

        $request->validated();

        $newStop = new Stop();

        // // chiamata API per la conversione dell'indirizzo in latitudine e longitudine
        // $res = file_get_contents('https://api.tomtom.com/search/2/geocode/' . Str::slug($request->address) . '.json?key=N4I4VUaeK36jrRC3vR5FfWqJS6fP6oTY');
        // // conversione del risultato json in un array associativo
        // $res = json_decode($res, true);

        // // inserimento della latitudine del nuovo appartamento
        // $newStop->latitude = $res['results'][0]['position']['lat'];

        // // inserimento della longitudine del nuovo appartamento
        // $newStop->longitude = $res['results'][0]['position']['lon'];


        $newStop->fill($request->all());

        // $newStop->slug = Str::slug($newStop->title);

        $newStop->save();

        return redirect()->route('admin.stops.show', $newStop->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Stop $stop)
    {
        // $stops = Stop::all();

        return view('admin.stops.show', compact('stop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stop $stop)
    {
        return view('admin.stops.edit', compact('stop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStopRequest $request, Stop $stop)
    {
        $request->validated();

        $stop->update($request->all());

        return redirect()->route('admin.stops.show', $stop->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stop $stop)
    {
        //
    }
}
