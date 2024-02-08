<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Activity;

class TimeController extends Controller
{
    public function index(Activity $activity)
    {
        $this->authorize('view', $activity);
        $times = $activity->times;
        return view('times.index', compact('activity', 'times'));
    }

    public function create(Activity $activity)
    {
        $this->authorize('update', $activity);
        return view('times.create', compact('activity'));
    }

    public function store(Request $request, Activity $activity)
    {
        $this->authorize('update', $activity);

        $request->validate([
            'date' => 'required|date',
            'hours' => 'required|integer|min:1|max:8',
        ]);

        $totalHours = $activity->times()->sum('hours');
        if (($totalHours + $request->hours) > 8) {
            return redirect()->back()->with('error', 'No se pueden agregar más de 8 horas en total para esta actividad.');
        }

        $activity->times()->create([
            'date' => $request->date,
            'hours' => $request->hours,
        ]);

        return redirect()->route('activities.times.index', $activity)->with('success', 'Tiempo agregado con éxito');
    }

    public function edit(Activity $activity, Time $time)
    {
        $this->authorize('update', $activity);
        return view('times.edit', compact('activity', 'time'));
    }

    public function update(Request $request, Activity $activity, Time $time)
    {
        $this->authorize('update', $activity);

        $request->validate([
            'date' => 'required|date',
            'hours' => 'required|integer|min:1|max:8',
        ]);

        $totalHours = $activity->times()->where('id', '!=', $time->id)->sum('hours');
        if (($totalHours + $request->hours) > 8) {
            return redirect()->back()->with('error', 'No se pueden agregar más de 8 horas en total para esta actividad.');
        }

        $time->update([
            'date' => $request->date,
            'hours' => $request->hours,
        ]);

        return redirect()->route('activities.times.index', $activity)->with('success', 'Tiempo actualizado con éxito');
    }

    public function destroy(Activity $activity, Time $time)
    {
        $this->authorize('delete', $activity);

        $time->delete();

        return redirect()->route('activities.times.index', $activity)->with('success', 'Tiempo eliminado con éxito');
    }
}
