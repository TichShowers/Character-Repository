@extends('shared/_adminlayout')

@section('title')
    Image
@endsection

@section('content')

    <h1>Create Category</h1>

    {!! Form::open(['route' => 'admin.category.store']) !!}
    @include('admin/category/_form', ['submit' => 'Add Category'])
    {!! Form::close() !!}
@endsection