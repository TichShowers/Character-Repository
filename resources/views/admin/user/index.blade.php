@extends('shared/_adminlayout')

@section('title')
    Users
@endsection

@section('content')

    <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Create new User</a>

    <hr />

    @if($users->count())
        <ul class="list-group">
         @foreach($users as $user)
             <li class="list-group-item">
                 {{ $user->username }}
                 <span class="pull-right btn-group btn-group-xs">
                     <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" class="btn btn-primary">
                         <i class="glyphicon glyphicon-edit"></i> Edit
                     </a>
                     <a href="{{ route('admin.user.password', ['user' => $user->id]) }}" class="btn btn-default">
                         <i class="glyphicon glyphicon-lock"></i> Change Password
                     </a>
                     <a href="{{ route('admin.user.delete', ['user' => $user->id]) }}" class="btn btn-danger" data-post="true">
                         <i class="glyphicon glyphicon-trash"></i> Delete
                     </a>
                 </span>
             </li>
         @endforeach
        </ul>
    @else
        <p>No users</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection