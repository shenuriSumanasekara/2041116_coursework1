@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="/prof/{{$user->user_image}}" style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">

            <h2>{{ $user->first_name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/users/profile/{{$user->id}}" method="POST">
            
                <input type="hidden" name="id" value="{{$user->id}}"> 
                <label>Update Profile Image</label>
                <input type="file" name="user_image">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>

            
        </div>
    </div>
</div>


@endsection