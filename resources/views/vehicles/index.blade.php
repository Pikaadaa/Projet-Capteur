@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <h1 class="mt-4 h1">Liste des véhicules</h1>
        </div>

        <div class="col-auto ml-auto mt-2 col d-inline-block">
            <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('vehicles.create') }}">Ajouter</a></button>
        </div>
    </div>

    @livewire('vehicles-list')

@endsection