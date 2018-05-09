<?php

use Illuminate\Database\Seeder;

class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')->insert([
            'id' => 1,
            'name' => 'Community Garden',
            'imageFileName' => '/img/defaultImageFromPexels.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('systems')->insert([
            'id' => 2,
            'name' => 'Veggie Garden',
            'imageFileName' => '/img/defaultImageFromPexels.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('systems')->insert([
            'id' => 3,
            'name' => 'Flower Garden',
            'imageFileName' => '/img/defaultImageFromPexels.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
