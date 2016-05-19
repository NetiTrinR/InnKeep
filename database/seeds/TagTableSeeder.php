<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        DB::table('tags')->insert([
            ['name' => 'D&D 5e'],
            ['name' => 'players handbook'],
            ['name' => 'magic item'],
            ['name' => 'weapon']
        ]);
    }
}
