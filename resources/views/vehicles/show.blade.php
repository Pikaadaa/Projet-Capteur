@extends('layouts.app')

@section('content')
<div class="container">
<div class="mb-4 mt-4 bg-gray-200">
    <div class="row">
        <div class="col">
            <p class="text-center h3">{{ $vehicle->name }}</p>
        </div>
        
        <div class="col-auto ml-auto d-inline-block">
            <a class="mt-2 mb-3 btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
            <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
                @csrf
                @method('delete')
                <button class="mt-2 mb-3 bg-danger btn btn-danger" type="submit">Supprimer</button>
            </form>
        </div>
    </div>
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
        <div class="mb-4">
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
            @if(isset($vehicle->capturs[0]))
                {{$vehicle->capturs[0]->device}}
            @else
                Aucun
            @endif
            </p>
        </div>
    </div>
</div>



@if(isset($vehicle->capturs[0]))
    <div class="v" id='mapv'> 

    </div>
@else
    <div class="mt-5 d-flex justify-content-center align-self-center">
        <span class="h2">Aucun capteur assigné</span>
    </div>
@endif
</div>

@endsection