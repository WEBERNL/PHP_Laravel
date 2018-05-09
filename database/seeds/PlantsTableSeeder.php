<?php

use Illuminate\Database\Seeder;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            'id' => 1,
            'name' => 'FirstCarrots',
            'systemID' => 2,
            'roomID' => 1,
            'planttypeID' => 1,
            'comments' => 'first carrots of the growing season',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('plants')->insert([
            'id' => 2,
            'name' => 'FirstGreenStringBeans',
            'systemID' => 2,
            'roomID' => 1,
            'planttypeID' => 2,
            'comments' => 'first green string beans of the growing season',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('plants')->insert([
            'id' => 3,
            'name' => 'Sunflower',
            'systemID' => 3,
            'roomID' => 3,
            'planttypeID' => 3,
            'comments' => 'flower measures approximately 5 inches in diameter; grows to approximately 60 inches in height',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
