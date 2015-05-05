@include('shared/_errors')

<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug: ') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('weight', 'Weight: ') !!}
    {!! Form::text('weight', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'form-control btn btn-primary']) !!} <a href="{{ route('admin.image.index') }}" class="btn btn-default">cancel</a>
</div>