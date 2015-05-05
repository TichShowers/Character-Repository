@extends('shared/_adminlayout')

@section('title')
    Characters
@endsection

@section('content')
    <a href="{{ route('admin.character.create') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Create new Character</a>

    <hr/>

    @if($characters->count())
        <ul class="list-group">
         @foreach($characters as $character)
             <li class="list-group-item">
                 {{ $character->name }}
                 <span class="pull-right btn-group btn-group-xs">
                     <a href="{{ route('admin.character.edit', ['character' => $character->id]) }}" class="btn btn-primary">
                         <i class="glyphicon glyphicon-pencil"></i> Edit
                     </a>
                     <a href="{{ route('admin.character.image', ['character' => $character->id]) }}" class="btn btn-default">
                         <i class="glyphicon glyphicon-camera"></i> Upload Image
                     </a>
                     <a href="{{ route('admin.character.delete', ['character' => $character->id]) }}" class="btn btn-danger" data-post="true">
                         <i class="glyphicon glyphicon-trash"></i> Delete
                     </a>
                 </span>
             </li>
         @endforeach
        </ul>
    @else
        <p>No Characters</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection