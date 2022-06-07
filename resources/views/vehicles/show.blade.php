@extends('layouts.app')

@section('content')
    <div class="list_map">
        <div class="ml-4 list"> 
            <h1 class="pt-5 cap mb-4">Capteurs</h1>
            @if($vehicle->captursLocations()->count() > 0 )
                @foreach($vehicle->capturs as $captur)
                    <div class="mb-5 pl-3 pb-3 pt-2 mr-4 bg-white balise" id="captur">
                        <p class="border-bottom border-grey mt-0 mr-3 mb-2 fw-bold">#{{ $captur->id }}</p>
                        <p id="{{ $captur->id }}"class="d-inline-block h5 @if($captur->locations()->count() < 1) error_captur @endif ">{{ $captur->device}}</p>
                        <p class="fst-italic">
                            @if($captur->vehicle)
                                {{ $captur->vehicle->name }} | {{ $captur->vehicle->registration }}
                            @else
                                Aucune assignation
                            @endif
                        </p>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="container_mapv">
                <div class="container_map_top">
                    <div class="container_map_top_employee">
                        <div class="employee">
                            @if($vehicle->employee != null)
                                <h5 class="ml-4 mt-3 fst-italic fw-bold info">Information du salarié</h5>
                                <img class="mb-3 profil" src="{{ asset('storage/'.$vehicle->employee->image_path) }}" class="card-img-top" alt="Photo de profil" >
                                <h5 class="text-center h5">{{ $vehicle->employee->full_name }}</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="text-center fst-italic">
                                        {{ $vehicle->employee->function }}
                                        @if($vehicle->employee->birthday_at != null)
                                            <p>{{ $vehicle->employee->birthday_at->format('d/m/Y') }}</p>
                                        @else
                                            <p>Date de naissance : Aucune date renseignée</p>
                                        @endif
                                    </li>
                                </ul>
                            @else
                                <h5 class="h5 text-center">Aucun Salarié assigné au véhicule</h5>
                            @endif
                        </div>
                    </div>

                    <div class="container_map_top_vehicle">
                            <div class="vehicle">
                                <p class="mt-2 mb-3 text-center h4">{{ $vehicle->name }}</p>
                                <div class="info_row p-1">
                                    <p class="fw-bold d-inline">Marque :</p>
                                    <p class="d-inline">{{ $vehicle->brand_name }}</p>
                                </div>
                                <div class="info_row p-1">
                                    <p class="fw-bold d-inline">Modèle :</p>
                                    <p class="d-inline ">{{ $vehicle->model }}</p>
                                </div>
                                <div class="info_row p-1">
                                    <p class="fw-bold d-inline">Immatriculation : </p>
                                    <p class="d-inline">{{ $vehicle->registration }}</p>
                                </div>
                                <div class="info_row p-1">
                                    <p class="fw-bold d-inline">Kilomètrage : </p>
                                    <p class="d-inline">{{ $vehicle->kilometer }}</p>           
                                </div>
                                <div class="info_row p-1">
                                    <p class="fw-bold d-inline">Année de fabrication : </p>
                                    <p class="d-inline">{{ $vehicle->year_of_manufacture }}</p>
                                </div>
                                <div class="info_row p-1">
                                    <p class="fw-bold d-inline">Date de mise en service : </p>
                                    <p class="d-inline">{{ $vehicle->date_of_establishment->format('d/m/Y') }}</p>
                                </div>
                                <div class="mt-4 col-auto text-center">
                                    <a class="mt-1 btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
                                    <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="mt-1 bg-danger btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="container_map_bot">
                    @if($vehicle->captursLocations()->count() > 0 )
                        <div class="map" id='mapv'> 

                        </div>
                    @else
                        <div class="mt-5 d-flex justify-content-center align-self-center">
                            <span class="h2">Aucune localisation trouvé</span>
                        </div>
                    @endif
                </div>
        </div>  
    </div>


@endsection