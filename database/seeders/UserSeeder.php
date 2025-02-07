<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use App\Models\Wallet;
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
            ['id' => 1, 'name' => 'Oluwatobi Solomon', 'email' => 'solando@gmail.com', 'username' => 'solando', 'gender' => 'Male', 'password'=>bcrypt('solomon001'), 'role'=>'admin'],
            ['id' => 2, 'name' => 'Sadia Emmanuel', 'email' => 'sadia@gmail.com', 'username' => 'lima', 'gender' => 'Female', 'password'=>bcrypt('solomon001'), 'role'=>'admin'],
        ];

        foreach($users as $user){
            $regUser = User::create($user);
            Profile::create(['user_id' => $regUser->id]);
            Wallet::create(['user_id' => $regUser->id, 'balance' => 0.0, 'points' => 0.0]);
        }
    }
}
