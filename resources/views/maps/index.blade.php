@extends('layouts.app')

@section('map')
<div class="mb-0 parent">
    <div class="mb-3 mt-3 mr-3 ml-3 div1 bg-dark text-white"> 
        <h1 class="pb-5 pt-5 h4 text-center">Liste des capteurs</h1>
        @foreach($capturs as $captur)
            <div class="mr-4 ml-4 pl-3 pb-3 pt-3 border-white border-top " id="captur">
                <p id="{{ $captur->id }}"class="d-inline-block h5 balise @if($captur->locations()->count() < 1) error_captur @endif ">{{ $captur->device}}</p>
            </div>
        @endforeach
    </div>

    <div class="map mr-2 mb-3 mt-3 div2" id='map'> 

    </div>
</div>
@endsection





