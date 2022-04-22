@extends('layouts.app')

@section('content')
    <h1 class="h1">Liste des véhicules</h1>
    <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('vehicles.create') }}">Ajouter</a></button>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @livewire('vehicles-list')

@endsection