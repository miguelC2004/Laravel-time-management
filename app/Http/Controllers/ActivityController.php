<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Auth::user()->activities;
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        // Auth::user()->activities()->create($request->all());

        return redirect()->route('activities.index')->with('success', 'Actividad creada con éxito');
    }

    public function show(Activity $activity)
    {
        $this->authorize('view', $activity);
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $this->authorize('update', $activity);
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->authorize('update', $activity);

        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $activity->update($request->all());

        return redirect()->route('activities.index')->with('success', 'Actividad actualizada con éxito');
    }

    public function destroy(Activity $activity)
    {
        $this->authorize('delete', $activity);

        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Actividad eliminada con éxito');
    }
}
