@extends('shared/_layout')

@section('title')
    Login
@endsection

@section('content')
    {!! Form::open() !!}
        <div>
            {!! Form::label('username', 'Username: ') !!}
            {!! Form::text('username', null, []) !!}
        </div>

        <div>
            {!! Form::label('password', 'Password: ') !!}
            {!! Form::password('password', null, []) !!}
        </div>

        <div>
            {!! Form::submit('Login', []) !!}
        </div>
    {!! Form::close() !!}
@endsection