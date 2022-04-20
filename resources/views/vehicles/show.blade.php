@extends('layouts.app')

@section('content')

<p>{{ $vehicle->name }}</p>
<p>{{ $vehicle->brand_name }}</p>
<p>{{ $vehicle->model }}</p>
<p>{{ $vehicle->registration }}</p>
<p>{{ $vehicle->kilometer }}</p>
<p>{{ $vehicle->year_of_manufacture }}</p>
<p>{{ $vehicle->date_of_establishment }}</p>
<p>{{ $vehicle->employee->full_name }}</p>

@endsection