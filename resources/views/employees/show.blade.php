@extends('layouts.app')

@section('content')

<p>{{ $employee->full_name }}</p>
<p>{{ $employee->function }}</p>
<p>{{ $employee->birthday_at->format('d/m/Y') }}</p>

@endsection