@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-4 h1">Liste des capteurs</h1>
            </div>
            <div class="col-auto ml-auto mt-2 col d-inline-block" >
                <button class="mt-4 btn btn-success "><a class="text-white text-decoration-none" href="{{ route('capturs.create') }}">Ajouter</a></button>
            </div>
        </div>
    </div>

    @livewire('capturs-list')

@endsection