@extends('shared/_adminlayout')

@section('title')
    Upload Image for {{ $character->name }}
@endsection

@section('content')
    <h1>Upload image for {{ $character->name }}</h1>

    {!! Form::open(['files' => true]) !!}
    @include('shared/_errors')

    <div class="form-group">
        {!! Form::label('image', 'Image: ') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Upload', ['class' => 'form-control btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection