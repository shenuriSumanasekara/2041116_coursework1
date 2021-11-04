<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_body' => $this->faker->realText($maxNbChars = 50),
            'user_id' =>  User::inRandomOrder()->first()->id,
            'post_id' =>  Post::inRandomOrder()->first()->id,
        ];
    }
}
