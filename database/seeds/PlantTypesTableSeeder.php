<?php

use Illuminate\Database\Seeder;

class PlantTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plant_types')->insert([
            'id' => 1,
            'name' => 'carrots',
            'systemID' => 2,
            'comments' => 'carrots are good for your vision',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('plant_types')->insert([
            'id' => 2,
            'name' => 'green string beans',
            'systemID' => 2,
            'comments' => 'green string beans are full of antioxidants',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('plant_types')->insert([
            'id' => 3,
            'name' => 'perennials',
            'systemID' => 3,
            'comments' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('plant_types')->insert([
            'id' => 4,
            'name' => 'annuals',
            'systemID' => 3,
            'comments' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
