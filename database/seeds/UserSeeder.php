<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@bcc.com',
            'roles' => 'Owner',
            'isAdmin' => 0,
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@bcc.com',
            'roles' => 'Admin',
            'isAdmin' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
