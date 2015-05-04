@extends('shared/_adminlayout')

@section('title')
    Change Password
@endsection

@section('content')

    <h1>Change password for {{ $user->username }}</h1>

    {!! Form::open() !!}
    @include('shared/_errors')

    <div class="form-group">
        {!! Form::label('password', 'Password: ') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('confirm_password', 'Confirm Password: ') !!}
        {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Change Password', ['class' => 'form-control btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection