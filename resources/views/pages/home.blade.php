@extends('layouts.app')

@section('title', 'Farahidi')

@section('content')
<iframe src="{{ asset('legacy/index.html') }}" title="Farahidi legacy frontend" style="width:100%;min-height:100vh;border:0;display:block"></iframe>
@endsection
