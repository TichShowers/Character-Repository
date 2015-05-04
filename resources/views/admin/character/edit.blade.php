@extends('shared/_adminlayout')

@section('title')
    Editing Character
@endsection

@section('content')
    <h1>Editing Character {{ $character->name }}</h1>

    {!! Form::model($character, ['route' => ['admin.character.update', $character->id]]) !!}
    @include('admin/character/_form', ['submit' => 'Update Character'])
    {!! Form::close() !!}
@endsection