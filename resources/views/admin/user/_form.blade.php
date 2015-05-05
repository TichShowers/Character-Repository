@include('shared/_errors')

<div class="form-group">
    {!! Form::label('username', 'Username: ') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email: ') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('active', 'Account Enabled: ') !!}
    {!! Form::checkbox('active') !!}
</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'form-control btn btn-primary']) !!}
</div>