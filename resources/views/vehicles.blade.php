@extends('layouts.app')

@section('content')
    <h1>Liste des véhicules</h1>
    @if ($vehicles->count() > 0 )
        @foreach($vehicles as $vehicle)
        <div>
            <p>{{ $vehicle->id }}<p>
            <p>{{ $vehicle->name }}<p>
            <p>{{ $vehicle->brand }}<p>
            <p>{{ $vehicle->model }}<p>
            <p>{{ $vehicle->registration }}<p>
            <p>{{ $vehicle->kilometer }}<p>
            <p>{{ $vehicle->date_of_manufacture }}<p>
            <p>{{ $vehicle->employee_id }}<p><br>
            <a href='{{ route('vehicle.delete',['id' => $vehicle->id]) }}'>Supprimer</a>
            <a href='{{ route('vehicle.update',['id' => $vehicle->id]) }}'>Modifier</a>
        </div>
        @endforeach
    @else
    <span>Aucun véhicule enregistré</span>
@endif
@endsection