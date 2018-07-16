@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
             <th>Image</th>
             <th>Title</th>
             <th>Edit</th>
             <th>Delete</th>
        </thead>

        <tbody>
           @foreach($posts as $post)
                <tr>
                    <td></td>
                    <td>{{ $post->title }}</td>
                    <td><a class="btn btn-sm btn-info" href="">Edit</a></td>
                    <td><a class="btn btn-danger btn-sm" href="">Delete</a></td>
                </tr>
           @endforeach
        </tbody>

    </table>

@stop
