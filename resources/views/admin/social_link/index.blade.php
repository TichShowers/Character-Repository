@extends('shared/_adminlayout')

@section('title')
    Social Media Links
@endsection

@section('content')

    <h1>Social Media Links</h1>

    <a href="{{ route('admin.social-link.create') }}" class="btn btn-primary btn-lg">Create new Social Media Link</a>

    @if($social_links->count())
        <ul class="list-group">
         @foreach($social_links as $social_link)
             <li class="list-group-item">
                 {{ $social_link->name }}
                 <span class="pull-right btn-group btn-group-xs">
                     <a href="{{ route('admin.social-link.edit', ['category' => $social_link->id]) }}" class="btn btn-primary">
                         <i class="glyphicon glyphicon-pencil"></i> Edit
                     </a>
                     <a href="{{ route('admin.social-link.delete', ['category' => $social_link->id]) }}" class="btn btn-danger" data-post="true">
                         <i class="glyphicon glyphicon-trash"></i> Delete
                     </a>
                 </span>
             </li>
         @endforeach
        </ul>
    @else
        <p>No Social Media Links</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection
