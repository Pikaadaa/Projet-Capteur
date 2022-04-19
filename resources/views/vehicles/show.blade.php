@extends('layouts.app')

@section('content')

<p>{{ $vehicle->name }}</p>
<p>{{ $vehicle->brand }}</p>
<p>{{ $vehicle->model }}</p>
<p>{{ $vehicle->registration }}</p>
<p>{{ $vehicle->kilometer }}</p>
<p>{{ $vehicle->date_of_establishment }}</p>
<p>{{ $vehicle->employee->name }}</p>

@endsection