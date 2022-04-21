@extends('layouts.app')

@section('content')
    <h1 class="h1">Liste des véhicules</h1>
    <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('vehicles.create') }}">Ajouter</a></button>

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

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
                    <th scope="col">Année d’acquisition</th>
                    <th scope="col">Date de première mise en circulation</th>
                    <th scope="col">Salarié affecté</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <th scope="row"><a class="text-black text-decoration-none" href='{{ route('vehicles.show',['vehicle' => $vehicle]) }}'>{{ $vehicle->id }}</a></th>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->brand_name }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->registration }}</td>
                        <td>{{ $vehicle->kilometer }}</td>     
                        <td>{{ $vehicle->year_of_manufacture }}</td>               
                        <td>{{ $vehicle->date_of_establishment->format('d/m/Y') }}</td>
                        <td>
                        @if($vehicle->employee)
                            {{$vehicle->employee->full_name}}
                        @else
                            Aucun
                        @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('vehicles.edit',['vehicle' => $vehicle]) }}">Modifier</a>
                            <form action="{{ route('vehicles.destroy',['vehicle' => $vehicle]) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-danger btn btn-danger" type="submit">Supprimer</button>
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