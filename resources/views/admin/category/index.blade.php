@extends('shared/_adminlayout')

@section('title')
    Categories
@endsection

@section('content')

    <h1>Categories</h1>

    <a href=" {{ route('admin.category.edit') }}">Create new Category</a>

    @if($categories->count())
        <ul>
         @foreach($categories as $category)
             <li><a href="{{ route('admin.category.edit', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
         @endforeach
        </ul>
    @else
        <p>No Categories</p>
    @endif
@endsection