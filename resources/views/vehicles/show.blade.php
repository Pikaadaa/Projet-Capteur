@extends('layouts.app')

@section('content')
    <a href="{{ route("vehicles.index") }}"><svg class="ml-4 mt-1 d-inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M10.53 5.03a.75.75 0 10-1.06-1.06l-6.25 6.25a.75.75 0 000 1.06l6.25 6.25a.75.75 0 101.06-1.06L5.56 11.5H17a3.248 3.248 0 013.25 3.248v4.502a.75.75 0 001.5 0v-4.502A4.748 4.748 0 0017 10H5.56l4.97-4.97z"></path></svg></a>
    <div class="container">
        <div class="mb-2 bg-gray-200">
            <div class="row">
                <div class="col">
                    <p class="mt-2 mb-3 text-center h3">{{ $vehicle->name }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <div>
                    <p class="fw-bold d-inline">Marque :</p>
                    <p class="d-inline">{{ $vehicle->brand_name }}</p>
                </div>
                <div class="">
                    <p class="fw-bold d-inline">Modèle :</p>
                    <p class="d-inline ">{{ $vehicle->model }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <div class="">
                    <p class="fw-bold d-inline">Immatriculation : </p>
                    <p class="d-inline">{{ $vehicle->registration }}</p>
                </div>
                <div class="">
                    <p class="fw-bold d-inline">Kilomètrage : </p>
                    <p class="d-inline">{{ $vehicle->kilometer }}</p>           
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <div class="">
                    <p class="fw-bold d-inline">Année de fabrication : </p>
                    <p class="d-inline">{{ $vehicle->year_of_manufacture }}</p>
                </div>
                <div class="">
                    <p class="fw-bold d-inline">Date de mise en service : </p>
                    <p class="d-inline">{{ $vehicle->date_of_establishment }}</p>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <div class="mb-4">
                    <p class="fw-bold d-inline">Salarié en charge : </p>
                    <p class="d-inline">
                        @if($vehicle->employee != null)
                            {{ $vehicle->employee->full_name }}
                        @else
                            Aucun
                        @endif
                    </p>
                </div>
                <div class="">
                    <p class="fw-bold d-inline">Capteur assigné : </p>
                    <p class="d-inline">
                        @if($vehicle->capturs()->count() > 0 )
                            @foreach($vehicle->capturs as $captur)
                                {{ $captur->device }}
                            @endforeach
                        @else                                                                       
                            Aucun
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-auto text-center">
                <a class="mt-1 mb-3 btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
                <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
                    @csrf
                    @method('delete')
                    <button class="mt-1 mb-3 bg-danger btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>

        <div class="no_err mb-2 mt-0" id="err">
        </div>
        @if($vehicle->captursLocations()->count() > 0 )
            <div class="parent mb-0">
                <div class="mt-2 mr-3 div1 bg-dark text-white"> 
                    <h1 class="pb-5 pt-5 h4 text-center">Liste des capteurs</h1>
                    @foreach($vehicle->capturs as $captur)
                        <div class="mr-4 ml-4 pl-3 pb-3 pt-3 border-white border-top " id="captur">
                            <p id="{{ $captur->id }}"class="d-inline-block h5 balise @if($captur->locations()->count() < 1) error_captur @endif ">{{ $captur->device}}</p>
                        </div>
                    @endforeach
                </div>

                <div class="v div2 mt-2" id='mapv'> 

                </div>
            </div>
        @else
            <div class="mt-5 d-flex justify-content-center align-self-center">
                <span class="h2">Aucune localisation trouvé</span>
            </div>
        @endif
        
    </div>

@endsection