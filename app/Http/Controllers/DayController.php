<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Http\Requests\StoreDayRequest;
use App\Models\Stop;
use App\Models\Tour;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {   
        $tour = Tour::findOrFail($id);

        $days = $tour->days;

        return view('admin.days.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tours = Tour::all();
        
        return view('admin.days.create', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDayRequest $request)
    {   
        $tours = Tour::all();

        $request->validated();

        $newDay = new Day();

        $newDay->fill($request->all());

        $newDay->save();

        return redirect()->route('admin.days.show', $newDay->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Day $day)
    {
        $stops = Stop::all();

        return view('admin.days.show', compact('day', 'stops'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Day $day)
    {
        // $tours = Tour::all();

        return view('admin.days.edit', compact('day'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDayRequest $request, Day $day)
    {
        $request->validated();

        $day->update($request->all());

        return redirect()->route('admin.days.show', $day->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Day $day)
    {
        $day = Day::find($day);

        $day->delete();

        return redirect()->route('admin.days.index');
    }
}
