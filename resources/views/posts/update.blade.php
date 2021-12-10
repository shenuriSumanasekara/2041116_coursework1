<style>
    .container{
        width:700px !important;
    }
</style>
@extends('layouts.app')

@section('content')
<div class ="container mt-3 card">
    <div class="card-header font-family: cursive;">
    Create Post
    </div>
    <form method="post" action="{{ url('update')}}">
    @csrf
        <div>
            <input type="hidden" name="id" value="{{$data->id}}"> 
        </div>   
        <div class="card-body">
            <div class="form-group">
                <input class="form-control" type="text" name="post_body" id="post_body" placeholder="First Name" value="{{($data->post_body)}}">
            </div>       
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn-post btn btn-primary" style="width:100px">Update</button>
        </div>
    </form>
</div>
@endsection

