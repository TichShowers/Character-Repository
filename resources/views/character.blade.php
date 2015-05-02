@extends('shared/_layout')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <h1>Character {{ $character->name }}</h1>

    <p>{{ $character->description }}</p>
@endsection