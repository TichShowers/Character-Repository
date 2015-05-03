@extends('shared/_adminlayout')

@section('title')
    Editing Category
@endsection

@section('content')
    <h1>Editing Category {{ $category->name }}</h1>

    {!! Form::model($category, ['route' => ['admin.category.update', $category->id]]) !!}
    @include('admin/category/_form', ['submit' => 'Update Category'])
    {!! Form::close() !!}
@endsection