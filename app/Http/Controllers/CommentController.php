<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id,$user_id)
    {

        $comments = Comment::get()->where('post_id',$post_id)->sortByDesc("created_at");

        $post = Post::with('comments.user')->where('id', $post_id)->first();

        //$post = Post::where('id', '=',$post_id)->first();
        //$find_post = Post::find($post_id);
        $user = User::where('id','=', $user_id)->first();
        /*
        if($comments){
            foreach($comments as $comment){
                $user = User::where('id','=', $comment->user_id)->first();
                //return $commenter;
                return view('comments.commentindex')->with(array('comments'=>$comments,'user'=>$user, 'post'=>$post));
            }
        }
        */
        return view('comments.commentindex')->with(array('comments'=>$comments,'user'=>$user, 'post'=>$post));
        //$find_post = Post::find($post_id);
        //$user = User::where('id','=', $find_post->user_id)->first();
        //return view('comments.commentindex')->with(array('comments'=>$comments,'user'=>$user, 'post'=>$post));
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'comment_body' => 'required|max:1000',
        ]);

        $newComment = new Comment;
        $newComment->comment_body = $validatedData['comment_body'];
        $newComment->user_id=$request->user_id ;
        $newComment->post_id=$request->post_id ;
        $newComment->save();
        //return post_id;
        //session()->flash('messsage', 'Posted!');

        return redirect('/posts/index/getUserDetails');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('comments.update',['data'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'comment_body' => 'required|max:500',
        ]);

        $comment = Comment::find($request->id);
        $comment->comment_body = $validatedData['comment_body'];
        $comment->save();
        return redirect('/posts/index/getUserDetails');
        
    }


    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/posts/index/getUserDetails');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
