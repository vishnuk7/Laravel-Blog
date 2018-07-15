@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    @endif

    <div class="card">
        <div class="card-header">
            Create a new post
        </div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="form-group">
                    <label for="feature">Featured Image</label>
                    <input type="file" class="form-control" name="picture" id="feature">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                            <button class="btn btn-success" type="submit">
                                Submit Post
                            </button>
                    </div>

                </div>

            </form>
        </div>
    </div>

@stop
