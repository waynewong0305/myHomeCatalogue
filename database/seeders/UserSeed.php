<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'role' => 'admin',
                'password' => '$2y$10$VHlTKy9iNHGA6Ztkc82g8.0epTWTjCRJXKwuyfNrM7azPSKeI7F8a' //abcd1234
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
