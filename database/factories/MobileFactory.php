<?php

namespace Database\Factories;
use App\Models\Mobile;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  User::inRandomOrder()->first()->id,
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
