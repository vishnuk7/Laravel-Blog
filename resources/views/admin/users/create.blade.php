@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    <div class="card">
        <div class="card-header">
            Create a new User
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

                <div class="form-group">
                            <button class="btn btn-success" type="submit">
                                Submit User
                            </button>
                </div>

            </form>
        </div>
    </div>

@stop
