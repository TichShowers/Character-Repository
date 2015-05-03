@extends('shared/_adminlayout')

@section('title')
    New Category
@endsection

@section('content')

    <h1>Create Category</h1>

    {!! Form::open(['route' => 'admin.category.store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug: ') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('weight', 'Weight: ') !!}
        {!! Form::text('weight', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Category', ['class' => 'form-control btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection