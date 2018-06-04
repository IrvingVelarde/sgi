<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Admin
        User::create([
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 0
        ]);

        // Support
        User::create([
            'name'  => 'Support',
            'email' => 'support@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);

        // Client
        User::create([
            'name'  => 'Client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 2
        ]);
    }
}
