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
            'name' => 'user1',
            'email' => 'user1@bcc.com',
            'roles' => 'Owner',
            'isAdmin' => 0,
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@bcc.com',
            'roles' => 'Owner',
            'isAdmin' => 0,
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@bcc.com',
            'roles' => 'Owner',
            'isAdmin' => 0,
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user4',
            'email' => 'user4@bcc.com',
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
        DB::table('roles')->insert([
            'role' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'role' => 'Owner',
        ]);
        DB::table('roles')->insert([
            'role' => 'Staff',
        ]);
    }
}
