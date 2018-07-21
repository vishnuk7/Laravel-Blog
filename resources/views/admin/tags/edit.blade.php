@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    <div class="card">
        <div class="card-header">
            Update Tag:{{ $tag->tag }}
        </div>
        <div class="card-body">
            <form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $tag->tag }}" class="form-control" name="tag" id="name">
                </div>

                <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                Update Tag
                            </button>
                </div>

            </form>
        </div>
    </div>

@stop
