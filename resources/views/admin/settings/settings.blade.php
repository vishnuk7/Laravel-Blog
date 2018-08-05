@extends('layouts.app')

@section('content')

    @include('admin.include.errors')

    <div class="card">
        <div class="card-header">
            Edit blog Settings
        </div>
        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" class="form-control" value="{{ $settings->site_name }}" name="site_name" id="name">
                </div>


                <div class="form-group">
                    <label for="email">Contact Number</label>
                    <input type="number" class="form-control" name="contact_number" value="{{ $settings->contact_number }}" id="email">
                </div>

                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}" id="email">
                </div>


                <div class="form-group">
                     <button class="btn btn-success" type="submit">
                        Update Site Settings
                     </button>
                </div>

            </form>
        </div>
    </div>

@stop
