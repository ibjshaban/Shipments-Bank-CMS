@extends('backend.layout.master')

@section('pageTitle','Show user')

@section('content')
    <div class="section-header">
        <h1>{{ $user->name.' Profile'}}</h1>
    </div>
@endsection
