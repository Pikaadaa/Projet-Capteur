@extends('layouts.app')

@section('content')

<form action="">
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
        <div class="buton">
            <input type="submit" value="Enregister le véhicule">
        </div>
    </div>
</form>

@endsection
