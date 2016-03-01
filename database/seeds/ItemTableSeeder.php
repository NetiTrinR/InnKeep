<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate();
        App\Tag::find(1)->items()->save(new App\Item(['name'=>'Bag of Holding']));
    }
}
