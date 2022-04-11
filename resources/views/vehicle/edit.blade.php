@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <h1>Modifier le véhicule</h1>
    <a class=" btn btn-danger text-white text-decoration-none" href="{{ route('vehicle.index')}}">Annuler</a>
    <form action="{{ route('vehicle.update') }}" method="POST">
    @csrf
    @method('PUT')
        <div>
            <input type="hidden" name="id" value="{{ $vehicle->id }}">
            <div class="name">
                <label for="name">Désignation du véhicule</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $vehicle->name }}" required>
            </div>
            <div class="brand">
                <label for="brand">Marque du véhicule</label>
                <select class="form-select" name="brand" id="brand" required>
                    <option value="{{ $vehicle->brand }}">{{ $vehicle->brand }}</option>
                    <option value="Renault">Renault</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Peugeot">Peugeot</option>
                </select>
            </div><br>
            <div class="model mb-2">
                <label for="model">Model du véhicule</label>
                <input class="form-control" type="text" name="model" id="model" value="{{ $vehicle->model }}" required>
            </div>
            <div class="registration mb-2">
                <label for="registration">Immatriculation du véhicule</label>
                <input class="form-control" type="text" name="registration" id="registration" value="{{ $vehicle->registration }}" required>
            </div>
            <div class="kilometer mb-2">
                <label for="kilometer">Kilométrage du véhicule</label>
                <input class="form-control" type="text" name="kilometer" id="kilometer" value="{{ $vehicle->kilometer }}" required>
            </div>
            <div class="date_of_manufacture mb-2">
                <label for="date_of_manufacture">Date de création du véhicule</label>
                <input class="form-control" type="text" name="date_of_manufacture" id="date_of_manufacture" value="{{ $vehicle->date_of_manufacture }}" required>
            </div>
            <div class="employee mb-2">
                <label for="employee">Salarié en charge du véhicule</label>
                <select class="form-select" name="employee" id="employee">
                    @if($employee_name != null)
                        <option value="{{ $employee_name->name }}">{{ $employee_name->name }}</option>
                    @else
                        <option value="Aucun">Aucun</option>
                    @endif

                    @foreach($employees as $employee)
                        <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                    @endforeach

                    @if($employee_name != null)
                        <option value="Aucun">Aucun</option>
                    @endif
                </select>
            </div>
            <div class="buton mb-2">
                <input class="btn btn-success" type="submit" value="Enregister les modifications">
            </div>
        </div>
    </form>
@endsection