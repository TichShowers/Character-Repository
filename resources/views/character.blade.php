@extends('shared/_layout')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <div id="#details">
        <div>
            <img src="{{ $character->image }}">

            <h1>Character {{ $character->name }}</h1>
        </div>

        <div id="#description">
            {!! Markdown::transform($character->description) !!}
        </div>
    </div>
    <div id="#gallery">
        @if($character->images->count())
            <h2>Gallery</h2>
            <ul>
                @foreach($character->images as $image)
                    <li>
                        <div>
                            <img src="{{ $image->url }}">
                            <h3>{{ $image->name }}</h3>
                            Credit: <a href="{{ $image->credit }}">{{ $image->artist }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else

        @endif
    </div>


@endsection