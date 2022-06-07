@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h1">Ajouter un capteur</h1>
        <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('capturs.index')}}">Annuler</a></button>
        <form method="POST" action="{{ route('capturs.store') }}">
            @csrf
            <div>
                <div class="device mb-2">
                    <label class="form-label" for="device">Clé du capteur</label>
                    <input class="form-control @if($errors->has('device')) is-invalid @endif" type="text" name="device" id="device" value="{{ old('device') }}" required>
                    <p class="text-danger">{{ $errors->first('device') }}</p>
                </div>

                <div class="vehicle_id mb-2">
                    <label for="vehicle_id">Immatriculation de la voiture assignée (optionnel)</label>
                    <select class="form-select @if($errors->has('vehicle_id')) is-invalid @endif" name="vehicle_id" id="vehicle_id" >
                        <option value="">Ne pas affecter</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" @if($vehicle->id == old('vehicle_id')) selected @endif >{{ $vehicle->registration }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger">{{ $errors->first('vehicle_id') }}</p>
                </div>
                
                <button class="bg-success btn btn-success" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
@endsection