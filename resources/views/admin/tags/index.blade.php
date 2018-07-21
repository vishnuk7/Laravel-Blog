@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
             <th>Name</th>
             <th>Editing</th>
             <th>Deleting</th>
        </thead>

        <tbody>
            @if($tags->count() > 0)
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->tag }}</td>
                        <td><a class="btn btn-sm btn-info" href="{{ route('tag.edit',['id'=>$tag->id]) }}">Edit</a></td>
                        <td><a class="btn btn-sm btn-danger" href="{{ route('tag.delete',['id'=>$tag->id]) }}">Delete</a></td>
                    </tr>
                @endforeach
            @else
                    <tr>
                        <th colspan="5" class="text-center">No Tags Yet</th>
                    </tr>
            @endif
        </tbody>

    </table>

@stop
