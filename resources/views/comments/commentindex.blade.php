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
<?php $user1 = Session::get('user'); ?>
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
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                <figcaption class="text-center">{{$user->first_name}}</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
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
          <!-- Second Comment Reply -->
          <ul>
            @foreach($comments as $comment)
                <li>
                    <article class="row">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                            <figcaption class="text-center">{{$user->first_name}}</figcaption>
                        </figure>
                        </div>
                        <div class="col-md-9 col-sm-9">
                        <div class="panel panel-default arrow left">
                            <div class="panel-heading right">Reply</div>
                            <div class="panel-body">
                            <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i> {{$user->first_name}}</div>
                                <time class="comment-date" ><i class="fa fa-clock-o"></i>2016-76-98</time>
                            </header>
                            <div class="comment-post">
                                <p>
                                {{$comment->comment_body}}
                                </p>
                            </div>
                            <a class="btnv" href="/update/comment/{{$comment->id}}" ><i class="fa fas fa-edit fa-2x " aria-hidden="true" style="margin-left: 100px;color:#1A64BE"></i></a>
                            <a class="btnv" href="/delete/comment/{{$comment->id}}"><i class="fa fas fa-trash fa-2x " aria-hidden="true" style="color:#1A64BE"></i></a>
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

@endsection