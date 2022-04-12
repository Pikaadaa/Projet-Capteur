@extends('layouts.app')

@section('content')
<button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('vehicles.index')}}">Annuler</a></button>
<form method="POST" action="{{ route('vehicles.store') }}">
    @csrf
    <div>
        <h1>Ajouter un véhicule</h1>
        <div class="name mb-2">
            <label class="form-label" for="name">Désignation du véhicule</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="brand">
            <label for="brand">Marque du véhicule</label>
            <select class="form-select" name="brand" id="brand" required>
                <option value="Renault">Renault</option>
                <option value="Toyota">Toyota</option>
                <option value="Peugeot">Peugeot</option>
            </select>
        </div><br>
        <div class="model mb-2">
            <label for="model">Model du véhicule</label>
            <input class="form-control" type="text" name="model" id="model" required>
        </div>
        <div class="registration mb-2">
            <label for="registration">Immatriculation du véhicule</label>
            <input class="form-control" type="text" name="registration" id="registration" required>
        </div>
        <div class="kilometer mb-2">
            <label for="kilometer">Kilométrage du véhicule</label>
            <input class="form-control" type="text" name="kilometer" id="kilometer" required>
        </div>
        <div class="date_of_manufacture mb-2">
            <label for="date_of_manufacture">Date de création du véhicule</label>
            <input class="form-control" type="text" name="date_of_manufacture" id="date_of_manufacture" required>
        </div>
        <div class="employee mb-2">
            <label for="employee">Salarié en charge du véhicule</label>
            <select class="form-select" name="employee_id" id="employee">
                <option value="">Ne pas affecter</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="buton mb-2">
            <input class="btn btn-success" type="submit" value="Ajouter">
        </div>
    </div>
</form>

@endsection
