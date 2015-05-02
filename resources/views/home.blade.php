@extends('shared/_layout')

@section('title')
   Home
@endsection

@section('content')
    <h1>Home</h1>

    @if(!$categories->count())
        <p>There are no categories.</p>
    @else
        <ul>
            @foreach($categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection