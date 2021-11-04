<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment;
        $comment->comment_body="This is the first Comment";
        $comment->user_id=2;
        $comment->post_id=2;
        $comment->save();

        $comments = Comment::factory()->count(20)->create();
    }
}
