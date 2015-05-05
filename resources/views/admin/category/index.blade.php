@extends('shared/_adminlayout')

@section('title')
    Category
@endsection

@section('content')

    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Create new Category</a>

    <hr/>

    @if($categories->count())
        <ul class="list-group">
         @foreach($categories as $category)
             <li class="list-group-item">
                 {{ $category->name }}
                 <span class="pull-right btn-group btn-group-xs">
                     <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" class="btn btn-primary">
                         <i class="glyphicon glyphicon-pencil"></i> Edit
                     </a>
                     <a href="{{ route('admin.category.delete', ['category' => $category->id]) }}" class="btn btn-danger" data-post="true">
                         <i class="glyphicon glyphicon-trash"></i> Delete
                     </a>
                 </span>
             </li>
         @endforeach
        </ul>
    @else
        <p>No Categories</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection