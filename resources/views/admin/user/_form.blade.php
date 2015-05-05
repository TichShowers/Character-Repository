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
    {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!} <a href="{{ route('admin.user.index') }}" class="btn btn-default">cancel</a>
</div>