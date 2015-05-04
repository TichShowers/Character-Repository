@extends('shared/_adminlayout')

@section('title')
    Editing Social Media Link
@endsection

@section('content')
    <h1>Editing Social Media Link {{ $social_link->name }}</h1>

    {!! Form::model($social_link, ['route' => ['admin.social-link.update', $social_link->id]]) !!}
    @include('admin/social_link/_form', ['submit' => 'Update Social Media Link'])
    {!! Form::close() !!}
@endsection