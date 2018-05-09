<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'id' => 1,
            'name' => 'Greenhouse A',
            'systemID' => 2,
            'comments' => 'Temperature controlled year round',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 2,
            'name' => 'Greenhouse B',
            'systemID' => 2,
            'comments' => 'Temperature controlled during colder months',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rooms')->insert([
            'id' => 3,
            'name' => 'Greenhouse A',
            'systemID' => 3,
            'comments' => 'Temperature controlled during colder months',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
