@extends('shared/_adminlayout')

@section('title')
    User
@endsection

@section('content')

    <h1>Create User</h1>

    {!! Form::open(['route' => 'admin.user.store']) !!}
    @include('admin/user/_form', ['submit' => 'Add User'])
    {!! Form::close() !!}
@endsection