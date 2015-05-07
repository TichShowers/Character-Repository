@extends('shared/_layout')

@section('title')
   Home
@endsection

@section('content')
    @if(!$categories->count())
        <p>The webmaster has not yet added any content</p>
    @else
        <div id="category">
            @foreach($categories as $category)
                <div>
                    <h2>{{ $category->name }}</h2>

                    @foreach($category->characters as $character)
                        <div>
                            <a href="{{ route('Character', ['category' => $category->slug, 'character' => $character->slug]) }}"><img src="{{ $character->image }}"></a>
                            <a href="{{ route('Character', ['category' => $category->slug, 'character' => $character->slug]) }}">{{ $character->name }}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif
@endsection