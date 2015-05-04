@extends('shared/_adminlayout')

@section('title')
    Characters
@endsection

@section('content')

    <h1>Characters</h1>

    <a href="{{ route('admin.character.create') }}" class="btn btn-primary btn-lg">Create new Character</a>

    @if($characters->count())
        <ul class="list-group">
         @foreach($characters as $character)
             <li class="list-group-item">
                 {{ $character->name }}
                 <span class="pull-right btn-group btn-group-xs">
                     <a href="{{ route('admin.character.edit', ['character' => $character->id]) }}" class="btn btn-primary">
                         <i class="glyphicon glyphicon-pencil"></i> Edit
                     </a>
                     <a href="{{ route('admin.character.delete', ['character' => $character->id]) }}" class="btn btn-danger" data-post="true">
                         <i class="glyphicon glyphicon-trash"></i> Delete
                     </a>
                 </span>
             </li>
         @endforeach
        </ul>
    @else
        <p>No Character</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection

@section("scripts")
    <script type="text/javascript" src="/js/formsubmitter.js"></script>
@endsection