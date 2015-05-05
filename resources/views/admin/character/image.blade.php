@extends('shared/_adminlayout')

@section('title')
    Image
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
        {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!} <a href="{{ route('admin.character.index') }}" class="btn btn-default">cancel</a>
    </div>
    {!! Form::close() !!}
@endsection