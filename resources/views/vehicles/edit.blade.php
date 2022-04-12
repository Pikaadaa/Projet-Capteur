@extends('layouts.app')

@section('content')
    <h1>Modifier le véhicule</h1>
    <a class=" btn btn-danger text-white text-decoration-none" href="{{ route('vehicles.index')}}">Annuler</a>
    <form action="{{ route('vehicles.update', ['vehicle'=> $vehicle]) }}" method="POST">
    @csrf
    @method('PUT')
        <div>
            <div class="name">
                <label for="name">Désignation du véhicule</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $vehicle->name }}" required>
            </div>
            <div class="brand">
                <label for="brand">Marque du véhicule</label>
                <select class="form-select" name="brand" id="brand" required>
                    <option value="Renault" @if($vehicle->brand == 'Renault') selected @endif>Renault</option>
                    <option value="Toyota" @if($vehicle->brand == 'Toyota') selected @endif>Toyota</option>
                    <option value="Peugeot" @if($vehicle->brand == 'Peugeot') selected @endif>Peugeot</option>
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
                <select class="form-select" name="employee_id" id="employee">
                    <option value="">Ne pas affecter</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" @if($vehicle->employee_id == $employee->id) selected @endif >{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="buton mb-2">
                <input class="btn btn-success" type="submit" value="Enregister les modifications">
            </div>
        </div>
    </form>
@endsection