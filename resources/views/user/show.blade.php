@extends('layouts._app')

@section('content')
    <pre>{{ dd(Auth::user()) }}</pre>
@endsection