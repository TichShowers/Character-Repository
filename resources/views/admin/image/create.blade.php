@extends('shared/_adminlayout')

@section('title')
    Image
@endsection

@section('content')

    <h1>Upload image</h1>

    {!! Form::open(['files' => true]) !!}
    @include('shared/_errors')

    @include('admin/image/_upload')
    @include('admin/image/_form')

    <div class="form-group">
        {!! Form::submit('Upload new image', ['class' => 'btn btn-primary']) !!} <a href="{{ route('admin.image.index') }}" class="btn btn-default">cancel</a>
    </div>
    {!! Form::close() !!}
@endsection