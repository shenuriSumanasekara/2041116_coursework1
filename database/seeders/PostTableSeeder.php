<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->post_body= "This is the first post!!";
        $post->view_count = 3;
        $post->like_count = 2;
        $post->comment_count = 3;
        $post->image="dog2.jpeg";
        $post->user_id = 2;
        $post->save();


        $posts = Post::factory()->count(20)->create();

    }
}
