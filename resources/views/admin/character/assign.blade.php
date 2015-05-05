@extends('shared/_adminlayout')

@section('title')
    Image
@endsection

@section('content')
    <h2>Adding images to {{ $character->name }}</h2>

    @if($images->count())
        <div class="row">
            @foreach($images as $image)
                <div class="col-lg-3 admin-image">
                    <h3>{{ $image->name }}</h3>
                    <img src="{{ $image->url }}"/>
                    <div>
                         <a href="{{ route('admin.character.add', ['id'=> $character->id, 'image' => $image->id]) }}" class="{{ $character->images->contains($image->id)? "hidden" : "" }} btn btn-success" data-ajax="true">
                             <i class="glyphicon glyphicon-plus-sign"></i> Add
                         </a>
                         <a href="{{ route('admin.character.remove', ['id'=> $character->id, 'image' => $image->id]) }}" class="btn btn-danger {{ !$image->characters->contains($character->id) ? "hidden" : "" }}" data-ajax="true">
                             <i class="glyphicon glyphicon-remove-sign"></i> Remove
                         </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No Images uploaded</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('a[data-ajax]').click(ajaxForm);
        });

        var ajaxForm = function(e){
            e.preventDefault();
            var $this = $(this);

            var antiForgeryToken = $('#anti-forgery-token input');
            var antiForgeryInput = $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', antiForgeryToken.attr('name'))
                    .val(antiForgeryToken.val());

            var form = $('<form>')
                    .attr('method', 'POST')
                    .attr('action', $this.attr('href'))
                    .css('display', 'none')
                    .append(antiForgeryInput);

            $.ajax({
                data : form.serialize(),
                method : 'POST',
                url : $this.attr('href'),
                success : function(data) {
                    if(data === 'success')
                    {
                        $this.parent().children().removeClass('hidden');
                        $this.addClass('hidden');
                    }
                }
            });
        }
    </script>
@endsection
