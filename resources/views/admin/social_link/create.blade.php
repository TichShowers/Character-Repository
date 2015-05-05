@extends('shared/_adminlayout')

@section('title')
    Social Media Link
@endsection

@section('content')

    <h1>Create Media Link</h1>

    {!! Form::open(['route' => 'admin.social-link.store']) !!}
    @include('admin/social_link/_form', ['submit' => 'Add Social Media Link'])
    {!! Form::close() !!}
@endsection