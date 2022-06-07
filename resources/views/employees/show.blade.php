@extends('layouts.app')

@section('content')

<a href="{{ route("employees.index") }}"><svg class="ml-4 mt-2 d-inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M10.53 5.03a.75.75 0 10-1.06-1.06l-6.25 6.25a.75.75 0 000 1.06l6.25 6.25a.75.75 0 101.06-1.06L5.56 11.5H17a3.248 3.248 0 013.25 3.248v4.502a.75.75 0 001.5 0v-4.502A4.748 4.748 0 0017 10H5.56l4.97-4.97z"></path></svg></a>
<div class="d-flex ml-auto mr-auto mt-5 card " style="width: 20rem;">
  <img src="{{ asset('storage/'.$employee->image_path) }}" class="card-img-top" alt="Photo de profil" >
    <div class="card-body">
      <h5 class="text-center h5 card-title">{{ $employee->full_name }}</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class=" list-group-item">Fonction : {{ $employee->function }}</li>
      <li class=" list-group-item"> 
        @if($employee->birthday_at != null)
            <p>Date de naissance : {{ $employee->birthday_at->format('d/m/Y') }}</p>
        @else
            <p>Date de naissance : Aucune date renseignée</p>
        @endif
      </li>
    </ul>
    <div class="bg-gray-100 card-body text-center">
        <a class="btn btn-primary" href="{{ route('employees.edit',['employee' => $employee]) }}">Modifier</a>
        <form action="{{ route('employees.destroy',['employee' => $employee]) }}" class="d-inline-block" method="POST">
            @csrf
            @method('delete')
            <button class="bg-danger btn btn-danger" type="submit">Supprimer</button>
        </form>
    </div>
</div>

@endsection