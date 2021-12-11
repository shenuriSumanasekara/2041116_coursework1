<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        $comments = Comment::get()->where('post_id',$post_id)->sortByDesc("created_at");;
        return view('comments.commentindex',['comments' =>$comments]);
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
        $newComment->user_id=2 ;
        $newComment->post_id=2 ;
        $newComment->save();

        session()->flash('messsage', 'Posted!');

        return redirect('/comments/{post_id}');
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
