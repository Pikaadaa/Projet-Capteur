@extends('layouts.app')

@section('content')
    <div class="list_map">
        <div class="ml-4 list"> 
            <h1 class="pt-5 cap mb-4">Capteurs</h1>
                @foreach($capturs as $captur)
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
        </div>

        <div class="container_map">
            <!--
            <div class="map mr-2 mb-3 mt-3 d-inline-block" id='map'> 

            </div>
            -->
        </div>
    </div>
    
@endsection





