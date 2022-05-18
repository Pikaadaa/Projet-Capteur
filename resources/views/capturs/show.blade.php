@extends('layouts.app')

@section('content')

<a href="{{ route("capturs.index") }}"><svg class="ml-4 mt-2 d-inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M10.53 5.03a.75.75 0 10-1.06-1.06l-6.25 6.25a.75.75 0 000 1.06l6.25 6.25a.75.75 0 101.06-1.06L5.56 11.5H17a3.248 3.248 0 013.25 3.248v4.502a.75.75 0 001.5 0v-4.502A4.748 4.748 0 0017 10H5.56l4.97-4.97z"></path></svg></a>
<p>{{ $captur->device }}</p>
<p>{{ $captur->battery }}</p>
<p>{{ $captur->vehicle->registration }}</p>

@endsection