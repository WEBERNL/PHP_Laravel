<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'id' => 1,
            'systemID' => 3,
            'entity' => 'plant',
            'entityID' => 3,
            'userID' => 3,
            'comments' => 'Initial planting 5-5-2018',
            'imageFileName' => '',
            'share' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'id' => 2,
            'systemID' => 3,
            'entity' => 'plant',
            'entityID' => 3,
            'userID' => 3,
            'comments' => 'Should be flowering by 5-30-2018',
            'imageFileName' => '',
            'share' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
