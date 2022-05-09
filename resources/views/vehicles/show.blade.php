@extends('layouts.app')

@section('content')
<div class="mb-4 mt-4 border border-dark">
    <p class="text-center h3">{{ $vehicle->name }}</p>
    <div class="d-flex justify-content-around">
        <div>
            <p class="h5 d-inline">Marque :</p>
            <p class="d-inline">{{ $vehicle->brand_name }}</p>
        </div>
        <div class="">
            <p class="h5 d-inline">Modèle :</p>
            <p class="d-inline ">{{ $vehicle->model }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="">
            <p class="h5 d-inline">Immatriculation : </p>
            <p class="d-inline">{{ $vehicle->registration }}</p>
        </div>
        <div class="">
            <p class="h5 d-inline">Kilomètrage : </p>
            <p class="d-inline">{{ $vehicle->kilometer }}</p>           
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="">
            <p class="h5 d-inline">Année de fabrication : </p>
            <p class="d-inline">{{ $vehicle->year_of_manufacture }}</p>
        </div>
        <div class="">
            <p class="h5 d-inline">Date de mise en service : </p>
            <p class="d-inline">{{ $vehicle->date_of_establishment }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="">
            <p class="h5 d-inline">Salarié en charge : </p>
            <p class="d-inline">
                @if($vehicle->employee != null)
                    {{ $vehicle->employee->full_name }}
                @else
                    Aucun
                @endif
            </p>
        </div>
        <div class="">
            <p class="h5 d-inline">Capteur assigné : </p>
            <p class="d-inline">
            @if($vehicle->captur)
                {{$vehicle->captur->device}}
            @else
                Aucun
            @endif
            </p>
        </div>
    </div>

    <div class=text-center>
        <a class="mt-3 mb-3 btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
        <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
            @csrf
            @method('delete')
            <button class="mt-3 mb-3 bg-danger btn btn-danger" type="submit">Supprimer</button>
        </form>
    </div>
    
</div>


<div class="v" id='map'> 


</div>

@endsection