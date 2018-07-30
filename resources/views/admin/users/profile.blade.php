@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    <div class="card">
        <div class="card-header">
            Edit Your Profile
        </div>
        <div class="card-body">
            <form action="{{ route('users.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <div class="form-group">
                    <label for="avatar">Upload New Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input type="text" class="form-control" value="{{ $user->profile->facebook }}" name="facebook" id="facebook">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube Profile</label>
                    <input type="text" class="form-control" value="{{ $user->profile->youtube }}" name="youtube" id="youtube">
                </div>

                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
                </div>


                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                          Update Profile
                    </button>
                </div>

            </form>
        </div>
    </div>

@stop
