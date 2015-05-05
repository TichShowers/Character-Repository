@extends('shared/_adminlayout')

@section('title')
    Image
@endsection

@section('content')
    <a href="{{ route('admin.image.create') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Upload new Image</a>

    <hr />

    @if($images->count())
        <div class="row">
         @foreach($images as $image)
             <div class="col-lg-3 admin-image">
                 <h2>{{ $image->name }}</h2>
                 <img src="{{ $image->url }}"/>
                 <div>
                     <span class="btn-group btn-group-xs">
                     <a href="{{ route('admin.image.edit', ['id' => $image->id]) }}" class="btn btn-primary">
                         <i class="glyphicon glyphicon-edit"></i> Edit Details
                     </a>
                      <a href="{{ route('admin.image.image', ['id' => $image->id]) }}" class="btn btn-default">
                          <i class="glyphicon glyphicon-camera"></i> Upload new Image
                      </a>
                     <a href="{{ route('admin.image.delete', ['id' => $image->id]) }}" class="btn btn-danger" data-post="true">
                         <i class="glyphicon glyphicon-trash"></i> Delete
                     </a>
                 </span>
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
