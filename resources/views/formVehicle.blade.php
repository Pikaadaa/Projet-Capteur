@extends('layouts.app')

@section('content')

<button><a href="{{ route('vehicle.show')}}">Annuler</a></button>
<form method="POST" action="{{ route('vehicle.enregister') }}">
    @csrf
    <div>
        <h1>Ajouter un véhicule</h1>

        <div class="name">
            <label for="name">Désignation du véhicule</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="brand">
            <label for="brand">Marque du véhicule</label>
            <select name="brand" id="brand" required>
                <option value="Marque du véhicule">Choisissez la marque du véhicule</option>
                <option value="Renault">Renault</option>
                <option value="Toyota">Toyota</option>
                <option value="Peugeot">Peugeot</option>
            </select>
        </div><br>
        <div class="model">
            <label for="model">Model du véhicule</label>
            <input type="text" name="model" id="model" required>
        </div>
        <div class="registration">
            <label for="registration">Immatriculation du véhicule</label>
            <input type="text" name="registration" id="registration" required>
        </div>
        <div class="kilometer">
            <label for="kilometer">Kilométrage du véhicule</label>
            <input type="text" name="kilometer" id="kilometer" required>
        </div>
        <div class="date_of_manufacture">
            <label for="date_of_manufacture">Date de création du véhicule</label>
            <input type="text" name="date_of_manufacture" id="date_of_manufacture" required>
        </div>
        <div class="employee">
            <label for="employee">Salarié en charge du véhicule</label>
            <select name="employee" id="employee">
                <option value="default">Choisissez ou non le salarié</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="buton">
            <input type="submit" value="Ajouter">
        </div>
    </div>
</form>

@endsection
