@extends('shared/_adminlayout')

@section('title')
    Character
@endsection

@section('content')

    <h1>Create Character</h1>

    {!! Form::open(['route' => 'admin.character.store']) !!}
    @include('admin/character/_form', ['submit' => 'Add Character'])
    {!! Form::close() !!}
@endsection