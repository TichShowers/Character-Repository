@extends('shared/_adminlayout')

@section('title')
    Characters
@endsection

@section('content')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Create new Category</a>
    @if($categories->count())
        <a href="{{ route('admin.character.create') }}" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-plus"></i> Create new Character</a>

        <hr/>

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item ">
                    <h2 class="list-group-item-heading">
                        {{ $category->name }}
                        <span class="pull-right btn-group btn-group-xs">
                             <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" class="btn btn-primary">
                                 <i class="glyphicon glyphicon-pencil"></i> Edit
                             </a>
                             <a href="{{ route('admin.category.delete', ['category' => $category->id]) }}" class="btn btn-danger" data-post="true">
                                 <i class="glyphicon glyphicon-trash"></i> Delete
                             </a>
                         </span>
                    </h2>

                </li>
                @if($category->characters->count())
                    @foreach($category->characters as $character)
                        <li class="list-group-item">
                            {{ $character->name }}
                            <span class="pull-right btn-group btn-group-xs">
                                 <a href="{{ route('admin.character.edit', ['id' => $character->id]) }}" class="btn btn-primary">
                                     <i class="glyphicon glyphicon-pencil"></i> Edit
                                 </a>
                                 <a href="{{ route('admin.character.image', ['id' => $character->id]) }}" class="btn btn-default">
                                     <i class="glyphicon glyphicon-camera"></i> Upload Image
                                 </a>
                                 <a href="{{ route('admin.character.assign', ['id' => $character->id]) }}" class="btn btn-success">
                                     <i class="glyphicon glyphicon-picture"></i> Setup gallery
                                 </a>
                                 <a href="{{ route('admin.character.delete', ['id' => $character->id]) }}" class="btn btn-danger" data-post="true">
                                     <i class="glyphicon glyphicon-trash"></i> Delete
                                 </a>
                             </span>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item">There are no characters associated with this category</li>
                @endif
            @endforeach
        </ul>
    @else
        <p>You have no categories.</p>
    @endif

    <form id="anti-forgery-token">
        {!! Form::token() !!}
    </form>
@endsection