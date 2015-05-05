@extends('shared/_adminlayout')

@section('title')
    Image
@endsection

@section('content')
    <h1>Uploading new image for {{ $image->name }}</h1>

    {!! Form::open(['files' => true]) !!}
    @include('shared/_errors')

    @include('admin/image/_upload')

    <div class="form-group">
        {!! Form::submit('Upload image', ['class' => 'btn btn-primary']) !!} <a href="{{ route('admin.image.index') }}" class="btn btn-default">cancel</a>
    </div>
    {!! Form::close() !!}
@endsection