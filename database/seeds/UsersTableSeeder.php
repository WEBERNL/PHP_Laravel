<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Dan',
            'email' => 'Dan@gmail.com',
            'imageFileName' => '',
            'password' => bcrypt('random'),
            'systemID' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Lee',
            'email' => 'Lee@gmail.com',
            'imageFileName' => '',
            'password' => bcrypt('random'),
            'systemID' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Sarah',
            'email' => 'Sarah@gmail.com',
            'imageFileName' => '',
            'password' => bcrypt('random'),
            'systemID' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
