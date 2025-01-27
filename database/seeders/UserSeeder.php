<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['id' => 1, 'name' => 'Oluwatobi Solomon', 'email' => 'solando@gmail.com', 'gender' => 'Male', 'password'=>bcrypt('solomon001'), 'role'=>'admin'],
            ['id' => 2, 'name' => 'Sadia Emmanuel', 'email' => 'sadia@gmail.com', 'gender' => 'Female', 'password'=>bcrypt('solomon001'), 'role'=>'admin'],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
