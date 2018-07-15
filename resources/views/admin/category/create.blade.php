@extends('layouts.app')

@section('content')

    {{-- @if(count($errors) > 0)

        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach

    @endif --}}

    <div class="card">
        <div class="card-header">
            Create a new Category
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                Submit Category
                            </button>
                </div>

            </form>
        </div>
    </div>

@stop
