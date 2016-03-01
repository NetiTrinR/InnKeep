<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();
        App\Book::create(['name' => 'Players Handbook', 'version'=>'5th Edition']);
    }
}
