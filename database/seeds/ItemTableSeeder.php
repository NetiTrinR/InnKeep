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
        DB::table('item_tag')->truncate();

        $dndTag = App\Tag::find(1);
        $handbookTag = App\Tag::find(2);
        $magicItemTag = App\Tag::find(3);
        $weaponTag = App\Tag::find(4);

        $item = App\Item::create(['name'=>'Bag of Holding']);
        $item->tags()->saveMany([$dndTag, $magicItemTag]);
        unset($item);

        $item = App\Item::create(['name'=>'Crossbow']);
        $item->tags()->saveMany([$dndTag, $handbookTag, $weaponTag]);
    }
}
