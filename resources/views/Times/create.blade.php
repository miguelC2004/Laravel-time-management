@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Nuevo Tiempo</h1>
        
        <form action="{{ route('activities.times.store', $activity) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="date">Fecha:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hours">Horas:</label>
                <input type="number" name="hours" id="hours" class="form-control" step="0.1" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Tiempo</button>
        </form>
    </div>
@endsection