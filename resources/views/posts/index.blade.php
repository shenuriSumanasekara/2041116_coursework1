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
        
    }
</style>

@extends('layouts.app')



@section('content')
<?php $user = Session::get('user'); ?>
<div class ="container mt-3 card">
@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}
    </div>
@endif
</div>
<div class ="container mt-3 card">
    <div class="card-header font-family: cursive;">
    Create Post
    </div>
    <form method="post" action="{{ url('posts')}}">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <div>
                <input type="hidden" name="user_id" value="{{$user->id}}"> 
                </div>
                <textarea name="post_body" id="post_body" cols="100" rows="5" placeholder="Tell about your mischievous paw friend...."></textarea>
            </div>       
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn-post btn btn-primary" style="width:100px">Post</button>
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
                            <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                            <figcaption class="text-center">Username</figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> Username</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$post->created_at}}</time>
                                    </header>
                                    <div class="comment-post">
                                        <h3 style="color:#1A64BE">{{$post->post_body}}</h3>
                                    </div>
                                        <div> 
                                        <a class="btn btn-default btn-sm" style="border: #8B5FEA;  font-size : 11px;  color:#8B5FEA " href="/comments/{{$post->id}}"><i class="fa fa-comments-o fa-2x" aria-hidden="true" style="color:#8B5FEA "></i>   Comments     {{$post->comment_count}}</a>
                                        <a class="btn" href=# style="border: #1A64BE; color:#1A64BE font-size : 11px;" ><i class="fa fa-heart fa-2x " aria-hidden="true" style="color:#1A64BE"></i> Like    {{$post->like_count}}</a>
                                        <a class="btnv" href="/update/{{$post->id}}" ><i class="fa fas fa-edit fa-2x " aria-hidden="true" style="margin-left: 80px;  color:#1A64BE"></i></a>
                                        <a class="btnv" href="/delete/{{$post->id}}"><i class="fa fas fa-trash fa-2x " aria-hidden="true" style="color:#1A64BE"></i></a>
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
       