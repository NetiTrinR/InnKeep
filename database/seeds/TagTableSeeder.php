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
        App\Book::find(1)->tags()->save(new App\Tag(['name' => 'Magic Items']));
        App\Book::find(1)->tags()->save(new App\Tag(['name' => 'Weapon']));
    }
}
