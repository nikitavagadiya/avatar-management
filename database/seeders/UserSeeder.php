<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'id'                => 1,
                'name'              => "Nikita V",
                'wallet'            => 100,
                'email'             => "nikita@gmail.com",
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password'          => bcrypt('password'),
                'remember_token'    => Str::random(10),
                'created_at'        => date("Y-m-d H:i:s"),
                'updated_at'        => date("Y-m-d H:i:s"),
            ]
        ];

        User::insert($users);
    }
}
