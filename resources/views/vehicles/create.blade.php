@extends('layouts.app')

@section('content')
<h1 class="h1">Ajouter un véhicule</h1>
<button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('vehicles.index')}}">Annuler</a></button>
<form method="POST" action="{{ route('vehicles.store') }}">
    @csrf
    <div>
        <div class="name mb-2">
            <label class="form-label" for="name">Désignation du véhicule</label>
            <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" id="name" value="{{ old('name') }}" required>
            <p class="text-danger">{{ $errors->first('name') }}</p>
        </div>
        <div class="brand">
            <label for="brand">Marque du véhicule</label>
            <select class="form-select @if ($errors->has('brand')) is-invalid @endif" name="brand" id="brand" required>
                @foreach($brands as $key => $brand)
                    <option value="{{ $key }}" @if (old('brand') == $key) selected @endif >{{ $brand }}</option>
                @endforeach
            </select>
            <p class="text-danger">{{ $errors->first('brand') }}</p>
        </div>
        <div class="model mb-2">
            <label for="model">Model du véhicule</label>
            <input class="form-control @if($errors->has('model')) is-invalid @endif" type="text" name="model" id="model" value="{{ old('model') }}" required>
            <p class="text-danger">{{ $errors->first('model') }}</p>
        </div>
        <div class="registration mb-2">
            <label for="registration">Immatriculation du véhicule</label>
            <input class="form-control @if($errors->has('registration')) is-invalid @endif" type="text" name="registration" id="registration" value="{{ old('registration') }}" required>
            <p class="text-danger">{{ $errors->first('registration') }}</p>
        </div>
        <div class="kilometer mb-2">
            <label for="kilometer">Kilométrage du véhicule</label>
            <input class="form-control @if($errors->has('kilometer')) is-invalid @endif" type="number" name="kilometer" id="kilometer" value="{{ old('kilometer') }}" required>
            <p class="text-danger">{{ $errors->first('kilometer') }}</p>
        </div>
        <div class="year_of_manufacture mb-2">
            <label for="year_of_manufacture">Année d'acquisition du véhicule</label>
            <input class="form-control @if($errors->has('year_of_manufacture')) is-invalid @endif" type="number" name="year_of_manufacture" id="year_of_manufacture" value="{{ old('year_of_manufacture') }}" required >
            <p class="text-danger">{{ $errors->first('year_of_manufacture') }}</p>
        </div>
        <div class="date date_of_establishment mb-2" >
            <label for="date_of_establishment">Date de première mise en circulation</label>
            <input class="datepicker form-control @if($errors->has('date_of_establishment')) is-invalid @endif" type="text" name="date_of_establishment" value="{{ old('date_of_establishment') }}" required>
            <p class="text-danger">{{ $errors->first('date_of_establishment') }}</p>
        </div>
        <div class="employee mb-2">
            <label for="employee_id">Salarié en charge du véhicule</label>
            <select class="form-select @if($errors->has('employee_id')) is-invalid @endif" name="employee_id" id="employee_id" >
                <option value="">Ne pas affecter</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" @if($employee->id == old('employee_id')) selected @endif >{{ $employee->name }}</option>
                @endforeach
            </select>
            <p class="text-danger">{{ $errors->first('employee_id') }}</p>
        </div>
        
        <button class="bg-success btn btn-success" type="submit">Ajouter</button>
    </div>
</form>

@endsection
