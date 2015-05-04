@extends('shared/_adminlayout')

@section('title')
    Editing User
@endsection

@section('content')
    <h1>Editing User {{ $user->username }}</h1>

    {!! Form::model($user, ['route' => ['admin.user.update', $user->id]]) !!}
    @include('admin/user/_form', ['submit' => 'Update User'])
    {!! Form::close() !!}
@endsection