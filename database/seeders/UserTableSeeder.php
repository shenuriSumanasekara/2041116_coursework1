<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mobile;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new User;
        $a->first_name="Mark";
        $a->last_name="Andrew";
        $a->username="mark123";
        $a->email="mark12@gmail.com";
        $a->email_verified_at = "2021-11-01 23:30:06";
        $a->password="mark";
        $a->dob="1990-05-03";
        $a->user_image="default.jpeg";
        $a->is_admin="1";
        $a->remember_token= "42YyduhjVm";
        $a->save();

        $mobile = new Mobile;
        $mobile->phone_number = "0903454567";
        $a->mobile()->save($mobile);


        $users = User::factory()->count(20)->create();
        $mobiles = Mobile::factory()->count(20)->create();

    }
}
