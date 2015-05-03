@extends('shared/_adminlayout')

@section('title')
    Categories
@endsection

@section('content')

    <h1>Categories</h1>

    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-lg">Create new Category</a>

    @if($categories->count())
        <ul class="list-group">
         @foreach($categories as $category)
             <li class="list-group-item">
                 <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}">{{ $category->name }}</a>
             </li>
         @endforeach
        </ul>
    @else
        <p>No Categories</p>
    @endif
@endsection