@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    <div class="card">
        <div class="card-header">
            Create a new Tag
        </div>
        <div class="card-body">
            <form action="{{ route('tag.store') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="tag" id="name">
                </div>

                <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                Submit Tag
                            </button>
                </div>

            </form>
        </div>
    </div>

@stop
