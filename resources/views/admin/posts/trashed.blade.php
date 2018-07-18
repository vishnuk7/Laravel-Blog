@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
             <th>Image</th>
             <th>Title</th>
             <th>Edit</th>
             <th>Restore</th>
             <th>Destroy</th>
        </thead>

        <tbody>
            @if($posts->count()>0)
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{ $post->featured }}" width="140px" height="90px" alt="{{ $post->title }}"/></td>
                        <td>{{ $post->title }}</td>
                        <td><a class="btn btn-sm btn-info" href="">Edit</a></td>
                        <td><a class="btn btn-sm btn-success" href="{{ route('post.restore',['id'=>$post->id]) }}">Restore</a></td>
                        <td><a class="btn btn-sm btn-danger" href="{{ route('post.kill',['id'=>$post->id]) }}">Delete</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <th class="text-center" colspan="5">No Trashed Posts</th>
                </tr>
            @endif
        </tbody>

    </table>

@stop
