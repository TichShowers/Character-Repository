@include('shared/_errors')

<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type', 'Type: ') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('link', 'Full URI to account: ') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('css', 'Additional CSS classes: ') !!}
    {!! Form::text('css', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-primary']) !!} <a href="{{ route('admin.social-link.index') }}" class="btn btn-default">cancel</a>
</div>