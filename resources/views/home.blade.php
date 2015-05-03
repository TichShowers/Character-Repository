@extends('shared/_layout')

@section('title')
   Home
@endsection

@section('content')

    <h1>Home</h1>

    @if(!$categories->count())
        <p>There are no categories.</p>
    @else
        <div>
            @foreach($categories as $category)
                <h2>{{ $category->name }}</h2>

                @foreach($category->characters as $character)
                    <div>
                        <h3><a href="{{ route('Character', ['category' => $category->slug, 'character' => $character->slug]) }}">{{ $character->name }}</a></h3>
                        <img src="{{ $character->image }}">
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif
@endsection