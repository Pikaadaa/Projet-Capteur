@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col">
            <h1 class="h1">Liste des employés</h1>
        </div>
        <div class="col-auto ml-auto mt-2 col d-inline-block" >
            <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('employees.create') }}">Ajouter</a></button>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    
    @livewire('employees-list')

@endsection

