@extends('layouts.app')

@section('content')
    <h1>Liste des véhicules</h1>
    <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('vehicles.create') }}">Ajouter</a></button>
    @if ($vehicles->count() > 0 )
        <table class="text-center table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Désignation</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Modèle</th>
                    <th scope="col">Immatriculation</th>                    
                    <th scope="col">Kilométrage</th>
                    <th scope="col">Date de mise en service</th>
                    <th scope="col">Salarié responsable du véhicule</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <th scope="row"><a class="text-black text-decoration-none" href='{{ route('vehicles.show',['vehicle' => $vehicle]) }}'>{{ $vehicle->id }}</a></th>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->registration }}</td>
                        <td>{{ $vehicle->kilometer }}</td>                    
                        <td>{{ $vehicle->date_of_manufacture }}</td>
                        @if($vehicle->employee)
                            <td>{{$vehicle->employee->name}}</td>
                        @else
                            <td>Aucun</td>
                        @endif
                        <td>
                            <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" method="POST">
                                @csrf
                                <a class="btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <span>Aucun véhicule enregistré</span>
    @endif
@endsection