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
                <input @if($errors->has('name')) class="form-control is-invalid" @endif class="form-control" type="text" name="name" id="name" value="{{ old('name', $vehicle->name) }}" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="brand">
                <label for="brand">Marque du véhicule</label>
                <select @if($errors->has('brand')) class="form-control is-invalid" @endif class="form-select" name="brand" id="brand" required>
                    <option value="Renault" @if (old('brand', $vehicle->brand) == 'Renault') selected @endif>Renault</option>
                    <option value="Toyota" @if(old('brand', $vehicle->brand) =='Toyota') selected @endif>Toyota</option>
                    <option value="Peugeot" @if(old('brand', $vehicle->brand) == 'Peugeot') selected @endif>Peugeot</option>
                </select>
                <p class="text-danger">{{ $errors->first('brand') }}</p>
            </div><br>
            <div class="model mb-2">
                <label for="model">Model du véhicule</label>
                <input @if($errors->has('model')) class="form-control is-invalid" @endif class="form-control" type="text" name="model" id="model" value="{{ old('model', $vehicle->model) }}" required>
                <p class="text-danger">{{ $errors->first('model') }}</p>
            </div>
            <div class="registration mb-2">
                <label for="registration">Immatriculation du véhicule</label>
                <input @if($errors->has('registration')) class="form-control is-invalid" @endif class="form-control" type="text" name="registration" id="registration" value="{{ old('registration', $vehicle->registration) }}" required>
                <p class="text-danger">{{ $errors->first('registration') }}</p>
            </div>
            <div class="kilometer mb-2">
                <label for="kilometer">Kilométrage du véhicule</label>
                <input @if($errors->has('kilometer')) class="form-control is-invalid" @endif class="form-control" type="number" name="kilometer" id="kilometer" value="{{ old('kilometer', $vehicle->kilometer) }}" required>
                <p class="text-danger">{{ $errors->first('kilometer') }}</p>
            </div>
            <div class="date_of_manufacture mb-2">
                <label for="date_of_manufacture">Date de mise en service du véhicule</label>
                <input @if($errors->has('date_of_manufacture')) class="form-control is-invalid" @endif class="form-control" type="date" name="date_of_manufacture" id="date_of_manufacture" value="{{ old('date_of_manufacture', $vehicle->date_of_manufacture) }}" required>
                <p class="text-danger">{{ $errors->first('date_of_manufacture') }}</p>
            </div>
            <div class="employee mb-2">
                <label for="employee">Salarié en charge du véhicule</label>
                <select @if($errors->has('employee')) class="form-control is-invalid" @endif class="form-select" name="employee_id" id="employee">
                    <option value="">Ne pas affecter</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" @if($vehicle->employee_id == $employee->id) selected @endif >{{ $employee->name }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('employee') }}</p>
            </div>
            <div class="buton mb-2">
                <input class="btn btn-success" type="submit" value="Enregister les modifications">
            </div>
        </div>
    </form>
@endsection