<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::create([
            'name'=>'santiago Lucero',
            'email'=>'q@q',
            'password'=>bcrypt('password')
        ]);
    }
}
