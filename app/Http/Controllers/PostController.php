<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc("created_at");
        return view('posts.index',['posts' =>$posts]);

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
            'post_body' => 'required|max:500',
        ]);

        if($request->hasFile('image')){
    		$image = $request->file('image');
    		$filename = time() . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->resize(300, 300)->save( public_path('images/' . $filename ) );
        }
        	

        $newPost = new Post;
        $newPost->post_body = $validatedData['post_body'];
        $newPost->view_count=0;
        $newPost->like_count=0;
        $newPost->comment_count=0;
        $newPost->image = $filename;
        $newPost->user_id=$request->user_id;
        $newPost->save();

        if($newPost){
            return redirect('/posts/index/getUserDetails');
        }else{
            return back()->with('fail','Something Wrong!');
        }
        
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.update',['data'=>$post]);
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
            'post_body' => 'required|max:500',
        ]);

        $post = Post::find($request->id);
        $post->post_body = $validatedData['post_body'];
        $post->save();
        return redirect('/posts/index/getUserDetails');
        
    }

    public function like(Request $request, $post_id)
    {
        Post::find($post_id)->increment('like_count');
         return redirect('/posts/index/getUserDetails');
        /*
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Post::where('id', $id)->increment('like_count');
                break;
            case 'Unlike':
                Post::where('id', $id)->decrement('like_count');
                break;
        }
        return '';
    */
    }


    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
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
