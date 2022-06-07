@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h1">Modifier</h1>
        <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employees.index')}}">Annuler</a></button>
        <form method="POST" action="{{ route('employees.update', ['employee'=> $employee]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div>
                <div class="first_name mb-2">
                    <label class="form-label" for="first_name">Prénom</label>
                    <input class="form-control @if($errors->has('first_name')) is-invalid @endif" type="text" name="first_name" id="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
                    <p class="text-danger">{{ $errors->first('first_name') }}</p>
                </div>

                <div class="last_name mb-2">
                    <label class="form-label" for="last_name">Nom</label>
                    <input class="form-control @if($errors->has('last_name')) is-invalid @endif" type="text" name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
                    <p class="text-danger">{{ $errors->first('last_name') }}</p>
                </div>

                <div class="function mb-2">
                    <label for="function">Fonction</label>
                    <input class="form-control @if($errors->has('function')) is-invalid @endif" type="text" name="function" id="function" value="{{ old('function', $employee->function) }}" required>
                    <p class="text-danger">{{ $errors->first('function') }}</p>
                </div>

                <div class="date birthday_at mb-2">
                    <label for="birthday_at">Date d'anniverssaire</label>
                    <input class="datepicker form-control @if($errors->has('birthday_at')) is-invalid @endif" type="text" name="birthday_at" id="birthday_at" value="{{ old('birthday_at', $employee->birthday_at != null ? $employee->birthday_at->format('d/m/Y') : '' ) }}">
                    <p class="text-danger">{{ $errors->first('birthday_at') }}</p>
                </div>
                
                <div class="image mb-3">
                    <img src="{{ asset('storage/'. $employee->image) }}" class="img-fluid" width="200px" height="150px" alt="Photo profil" >
                    <label for="image">Modifier photo de profil</label>
                    <input class="form-control @if($errors->has('image')) is-invalid @endif" type="file" name="image" id="image" >
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>

                <button class="bg-success btn btn-success" type="submit">Enregister les modifications</button>
            </div>
        </form>
    </div>
@endsection