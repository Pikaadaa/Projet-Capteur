@php
    use App\Models\Employee;
@endphp

@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c6d5382c87.js" crossorigin="anonymous"></script>
    <h1>Liste des véhicules</h1>
    <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('vehicle.create') }}">Ajouter</a></button>
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
                        <th scope="row">{{ $vehicle->id }}</th>
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
                            <form action="{{ route('vehicle.destroy',['id' => $vehicle->id]) }}" method="POST">
                                @csrf
                                <a class="btn btn-primary" href="{{ route('vehicle.edit',['id' => $vehicle->id]) }}">Modifier</a>
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Supprimer">
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