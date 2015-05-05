@extends('shared/_layout')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <h1>Character {{ $character->name }}</h1>

    <p>{!! Markdown::transform($character->description) !!}</p>
@endsection