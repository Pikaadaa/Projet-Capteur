@extends('layouts.app')

@section('content')

<p>{{ $employee->full_name }}</p>
<p>{{ $employee->function }}</p>
@if($employee->birthday_at != null)
    <p>{{ $employee->birthday_at->format('d/m/Y') }}</p>
@else
    <p>Aucune date renseignée</p>
@endif

<a class="btn btn-primary" href="{{ route('employees.edit',['employee' => $employee]) }}">Modifier</a>
<form action="{{ route('employees.destroy',['employee' => $employee]) }}" class="d-inline-block" method="POST">
    @csrf
    @method('delete')
    <button class="bg-danger btn btn-danger" type="submit">Supprimer</button>
</form>

@endsection