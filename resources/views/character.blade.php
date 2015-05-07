@extends('shared/_layout')

@section('title')
    {{ $character->name }}
@endsection

@section('content')
    <div id="details">
        <div id="identity">
            <img src="{{ $character->image }}">

            <h1>{{ $character->name }}</h1>
        </div>

        <div id="description">
            {!! Markdown::transform($character->description) !!}
        </div>
    </div>
    <div id="gallery">
        @if($character->images->count())
            <ul>
                @foreach($character->images as $image)
                    <li>
                        <div>
                            <a class="fancybox" rel="group" href="{{ $image->url }}"><img src="{{ $image->url }}"></a>
                            <p>{{ $image->name }}</p>
                            <p>Credit: <a href="{{ $image->credit }}">{{ $image->artist }}</a></p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else

        @endif
    </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox();
        });
    </script>
@endsection