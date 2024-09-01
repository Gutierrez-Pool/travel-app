<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Day;
use App\Http\Requests\StoreTourRequest;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::all();

        return view('admin.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourRequest $request)
    {
        // Validazioni
        $request->validated();

        $newTour = new Tour();

        $newTour->fill($request->all());

        //collegamento appartamento al'utente che si è loggato
        // $newTour->user_id = Auth::id();

        $newTour->save();

        return redirect()->route('admin.tours.show', $newTour->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        $days = Day::all();
        // $tour = Tour::find($tour->id);
        // $days = Day::where('tour_id', '=', $tour->id);

        return view("admin.tours.show", compact('tour', 'days'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTourRequest $request, Tour $tour)
    {
        $request->validated();

        $tour->update($request->all());

        return redirect()->route('admin.tours.show', $tour->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('admin.tours.index');
    }
}
