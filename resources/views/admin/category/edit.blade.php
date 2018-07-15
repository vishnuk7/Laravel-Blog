@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    <div class="card">
        <div class="card-header">
            Update Category:{{ $category->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $category->name }}" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                Update Category
                            </button>
                </div>

            </form>
        </div>
    </div>

@stop
