@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('vehicle.index')}}">Annuler</a></button>
<form method="POST" action="{{ route('vehicle.store') }}">
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
                <option value="" disabled selected>Choisissez la marque du véhicule</option>
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
            <select class="form-select" name="employee" id="employee">
                <option value="">Choisissez ou non le salarié</option>
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
