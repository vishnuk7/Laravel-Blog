@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
             <th>Name</th>
             <th>Editing</th>
             <th>Deleting</th>
        </thead>

        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ route('category.edit',['id'=>$category->id]) }}">Edit</a></td>
                    <td><a class="btn btn-sm btn-danger" href="{{ route('category.delete',['id'=>$category->id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>

@stop
