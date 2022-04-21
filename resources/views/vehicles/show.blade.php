@extends('layouts.app')

@section('content')

<p>{{ $vehicle->name }}</p>
<p>{{ $vehicle->brand_name }}</p>
<p>{{ $vehicle->model }}</p>
<p>{{ $vehicle->registration }}</p>
<p>{{ $vehicle->kilometer }}</p>
<p>{{ $vehicle->year_of_manufacture }}</p>
<p>{{ $vehicle->date_of_establishment }}</p>
<p>{{ $vehicle->employee->full_name }}</p>

<a class="btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
<form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
    @csrf
    @method('delete')
    <button class="bg-danger btn btn-danger" type="submit">Supprimer</button>
</form>

@endsection