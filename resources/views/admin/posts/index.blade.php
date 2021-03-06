@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
             <th>Image</th>
             <th>Title</th>
             <th>Edit</th>
             <th>Trash</th>
        </thead>

        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><img src="{{ $post->featured }}" width="140px" height="90px" alt="{{ $post->title }}"/></td>
                    <td>{{ $post->title }}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ route('post.edit',['id'=>$post->id]) }}">Edit</a></td>
                    <td><a class="btn btn-sm btn-danger" href="{{ route('post.delete',['id'=>$post->id]) }}">Trash</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>

@stop
