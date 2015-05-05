@extends('shared/_adminlayout')

@section('title')
    Image
@endsection

@section('content')
    <h1>Changing details for image {{ $image->name }}</h1>

    {!! Form::model($image, ['route' => ['admin.image.update', $image->id]]) !!}
    @include('shared/_errors')

    @include('admin/image/_form')

    <div class="form-group">
        {!! Form::submit('Change details', ['class' => 'btn btn-primary']) !!} <a href="{{ route('admin.image.index') }}" class="btn btn-default">cancel</a>
    </div>
    {!! Form::close() !!}
@endsection