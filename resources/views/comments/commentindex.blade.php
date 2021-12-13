<style>
 .container{
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
<?php $userr = Session::getId(); ?>
<div class ="container mt-3 card">
    <div class="card-header font-family: cursive;">
    Comment
    </div>
    <form method="post" action="{{ url('comments/{post_id}')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <div>
                <input type="hidden" name="user_id" value="{{$user->id}}"> 
                </div>
                <div>
                <input type="hidden" name="post_id" value="{{$post->id}}"> 
                </div>
                <textarea name="comment_body" id="comment_body" cols="100" rows="5" placeholder="Tell about your mischievous paw friend...."></textarea>
            </div>       
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary" style="width:100px">Comment</button>
        </div>
    </form>
</div>
<div class="container mt-3 card">
 <div class="media border p-3">
  <div class="row">
    <div class="col-md-12">
        <section class="comment-list">
          <!-- Post -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src=" /prof/{{$post ->user->user_image}}" />
                <figcaption class="text-center">{{$post->user->first_name}}</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> {{$post->user->username}}</div>
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$post->created_at}}</time>
                  </header>
                  <div class="comment-post">
                    <p>
                     {{$post->post_body}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <!-- Comments -->
          <ul>
            @foreach($post->comments as $comment)
                <li>
                    <article class="row">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src=" /prof/{{$comment->user->user_image}}" />
                            <figcaption class="text-center">{{$comment->user->first_name}}</figcaption>
                        </figure>
                        </div>
                        <div class="col-md-9 col-sm-9">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                              <header class="text-left">
                                  <div class="comment-user"><i class="fa fa-user"></i> {{$comment->user->first_name}}</div>
                                  <time class="comment-date" ><i class="fa fa-clock-o"></i>{{$comment->created_at}}</time>
                              </header>
                              <div class="comment-post">
                                  <p> {{$comment->comment_body}}</p>
                              </div>
                              @if($user->id == $comment->user_id)
                                <a class="btnv" href="/update/comment/{{$comment->id}}" ><i class="fa fas fa-edit fa-2x " aria-hidden="true" style="margin-left: 100px;color:#1A64BE"></i></a>
                                <a class="btnv" href="/delete/comment/{{$comment->id}}"><i class="fa fas fa-trash fa-2x " aria-hidden="true" style="color:#1A64BE"></i></a>
                              @endif
                            </div>
                        </div>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
      </section>
    </div>
  </div>  
</div>
</div>

@endsection