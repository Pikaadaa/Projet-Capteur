@extends('layouts.app')

@section('content')
    <h1 class="h1">Modifier le capteur</h1>
    <a class=" btn btn-danger text-white text-decoration-none" href="{{ route('capturs.index')}}">Annuler</a>
    <form action="{{ route('capturs.update', ['captur'=> $captur]) }}" method="POST">
    @csrf
    @method('PUT')
        <div>
            <div class="device">
                <label for="device">Clé du capteur</label>
                <input class="form-control @if($errors->has('device')) is-invalid @endif" type="text" name="device" id="device" value="{{ old('device', $captur->device) }}" required>
                <p class="text-danger">{{ $errors->first('device') }}</p>
            </div>

            <div class="vehicle_id mb-2">
                <label for="vehicle_id">Immatriculation de la voiture assignée (optionnel)</label>
                <select class="form-select @if($errors->has('vehicle_id')) is-invalid @endif" name="vehicle_id" id="vehicle_id" >
                    <option value="">Ne pas affecter</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" @if($vehicle->id == old('vehicle_id',$captur->vehicle_id)) selected @endif >{{ $vehicle->registration }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('vehicle_id') }}</p>
            </div>
            <div class="buton mb-2">
                <input class="bg-success btn btn-success" type="submit" value="Enregister les modifications">
            </div>
        </div>
    </form>
@endsection