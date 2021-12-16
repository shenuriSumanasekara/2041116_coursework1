<style>
    .ainline{
    background-color: white;
    display: inline-block;
    border-radius: 35px !important; 
    border-style: solid !important;
    border-width: 2px !important; 
    width: 150px;
    height: 35px;
    
    }
    .btn{
    background-color: white !important;
    display: inline-block;
    border-radius: 35px !important; 
    border-style: solid !important;
    border-width: 2px !important; 
    width: 150px;
    height: 35px;
    padding: 1px 5px 1px 5px;
    text-align:center !important;
    display: flex;
    align-items: center;
    justify-content: center;
    } 
    .btn-primary{
        color: #1A64BE !important;
        font-size : 13px !important;
    }
    .comment-post{
       margin-top: 15px;
       height: 90px
    }.container{
        width:700px !important;
    }.row{
        padding: 6px;
    }.btnv{
        display: inline-block;
        background-color: white !important;
        
    }h3 {
        text-align: center;
        font-family: cursive !important;
        font-weight: bold !important;
        font-size: 20 !important;
    }
</style>

@extends('layouts.app')



@section('content')
<?php $user = Session::get('user'); ?>
<div class="register-photo">
    <div row>
    <div class="col-md-10 col-md-offset-1">
            <a href="/users/profile/{{$user->id}}"><img src="/prof/{{$user->user_image}}" style=" btn width:200px; height:200px; float:left; border-radius:50%; border:3px solid black; margin-right:25px; padding: 4px"></a>
            <div>
            <h2 style="color:#1A64BE">{{$user->first_name}}</h2><h3 style="color:#1A64BE">{{$user->last_name}}</h3>
    </div>
    </div>
        <div style="font-size:24px; padding: 4px 46px;">
            <i class="fa fa-fw fa-paw fa-lg " style="color:#1A64BE; ">
            <h3 style="color:#1A64BE">Puppy Media</h3></i>
        </div>
    
    </div>
</div>
<div class ="container mt-8 card">
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif

</div>
<div class ="container mt-3 card">
    <div class="card-header font-family: cursive;">
    Create Post
    </div>
    <form method="post" id="postForm" enctype="multipart/form-data"  action="{{ url('posts')}}">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <div>
                <input type="hidden" name="user_id" value="{{$user->id}}"> 
                </div>
                <div class="form-group"><textarea class="form-control" name="post_body"  id="post_body" cols="100" rows="5" placeholder="Tell about your mischievous paw friend...."></textarea>
                <span class="text-danger"> @error('post_body') {{$message}} @enderror</span>
                </div>  
            </div>       
        </div>
        <div class="card-footer">
            <ul style="background-color:white">
            <div>
                <a class="btnv text-left" href="#" ><i class="fa fas fa-image fa-3x " aria-hidden="true" style="margin-left:20px; color:#1A64BE"></i></a>
                    <input type="file" name="image">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            </ul>   
            <ul style="background-color:white">
            <button type="submit" class="btn-post btn btn-primary" style="float:right; width:100px">Post</button>
            </ul>
    </div>
    </form>
</div>
    <div class="container mt-3 card">
    <div class="media border p-3">
        <ul>
            @foreach($posts as $post)
                <li>
                    <article class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                            <img class="img-responsive" src=" /prof/{{$post->user->user_image}}" />
                            <figcaption class="text-center">{{$post->user -> first_name}}</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> {{$post->user -> username}}</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$post->created_at}}</time>
                                    </header>
                                    <div class="comment-post">
                                        <h3 style="color:#1A64BE">{{$post->post_body}}</h3>
                                    </div>
                                    <div>
                                        @if($post->image)
                                        <img src="/images/{{$post->image}}" style="width:400px; height:400px; float:center; border:1px solid black; ,margin-bottom:10px; padding:4px; "></a>
                                        @endif
                                    </div>
                                    
                                    <div style="margin-top:10px"> 
                                        <a class="btn btn-default btn-sm" style="border: #8B5FEA;  font-size : 11px;  color:#8B5FEA " href="/comments/{{$post->id}}/{{$user->id}}"><i class="fa fa-comments-o fa-2x" aria-hidden="true" style="color:#8B5FEA "></i>   Comments  {{count($post->comments)}}</a>
                                        
                                        <a class="btn" href="/post/like/{{$post->id}}" style="border: #1A64BE; color:#1A64BE font-size : 11px;" ><i class="fa fa-heart fa-2x " aria-hidden="true" style="color:#1A64BE"></i> Like    {{$post->like_count}}</a>

                                        @if($user->id == $post->user_id)
                                        <a class="btnv" href="/update/{{$post->id}}" ><i class="fa fas fa-edit fa-2x " aria-hidden="true" style="margin-left: 80px;  color:#1A64BE"></i></a>
                                        <a class="btnv" href="/delete/{{$post->id}}"><i class="fa fas fa-trash fa-2x " aria-hidden="true" style="color:#1A64BE"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article> 
                </li>
            @endforeach
        </ul> 
    </div>
 </div>
@endsection
       