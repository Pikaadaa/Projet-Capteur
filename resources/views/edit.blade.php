@extends('layouts.app')

@section('content')
    <h1>Modifier le véhicule</h1>
    <button><a href="{{ route('vehicle.show')}}">Annuler</a></button>
    <form action="{{ route('vehicle.edit') }}" method="POST">
    @csrf
        <div>
            <input type="hidden" name="id" value="{{ $vehicle->id }}">
            <div class="name">
                <label for="name">Désignation du véhicule</label>
                <input type="text" name="name" id="name" value="{{ $vehicle->name }}" required>
            </div>
            <div class="brand">
                <label for="brand">Marque du véhicule</label>
                <select name="brand" id="brand" required>
                    <option value="Marque du véhicule">{{ $vehicle->brand }}</option>
                    <option value="Renault">Renault</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Peugeot">Peugeot</option>
                </select>
            </div><br>
            <div class="model">
                <label for="model">Model du véhicule</label>
                <input type="text" name="model" id="model" value="{{ $vehicle->model }}" required>
            </div>
            <div class="registration">
                <label for="registration">Immatriculation du véhicule</label>
                <input type="text" name="registration" id="registration" value="{{ $vehicle->registration }}" required>
            </div>
            <div class="kilometer">
                <label for="kilometer">Kilométrage du véhicule</label>
                <input type="text" name="kilometer" id="kilometer" value="{{ $vehicle->kilometer }}" required>
            </div>
            <div class="date_of_manufacture">
                <label for="date_of_manufacture">Date de création du véhicule</label>
                <input type="text" name="date_of_manufacture" id="date_of_manufacture" value="{{ $vehicle->date_of_manufacture }}" required>
            </div>
            <div class="employee">
                <label for="employee">Salarié en charge du véhicule</label>
                <select name="employee" id="employee">
                    @foreach($employees_name as $employee_name)
                        <option value="{{ $employee_name->name }}">{{ $employee_name->name }}</option>
                    @endforeach
                
                    @foreach($employees as $employee)
                        <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="buton">
                <input type="submit" value="Enregister les modifications">
            </div>
        </div>
    </form>
@endsection