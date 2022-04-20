@extends('layouts.app')

@section('content')
    <h1 class="h1">Liste des employés</h1>
    <button class="btn btn-success "><a class="text-white text-decoration-none" href="{{ route('employees.create') }}">Ajouter</a></button>
    @if ($employees->count() > 0 )
        <table class="text-center table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>                    
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <th scope="row"><a class="text-black text-decoration-none" href='{{ route('employees.show',['employee' => $employee]) }}'>{{ $employee->id }}</a></th>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->function }}</td>
                        <td>{{ $employee->birthday_at->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('employees.edit',['employee' => $employee]) }}">Modifier</a>
                            <form action="{{ route('employees.destroy',['employee' => $employee]) }}" class="d-inline-block" method="POST">
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