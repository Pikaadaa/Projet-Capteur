@extends('layouts.app')

@section('map')
<div class="mb-0 parent">
    <div class="mb-0 mt-0 div1 bg-secondary text-white"> 
        <h1 class="pb-5 pt-5 h3 text-center">Liste des capteurs</h1>
        @foreach($capturs as $captur)
            <div class="pb-4 pt-4 border-white border-top border-bottom text-center" id="captur">
                <p id="{{ $captur->id }}"class="h5">{{ $captur->device}}</p>
            </div>
        @endforeach
    </div>

    <div class="map mb-0 mt-0 div2" id='map'> 

    </div>
</div>
@endsection





