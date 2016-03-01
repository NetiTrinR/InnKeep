<?php

use Illuminate\Database\Seeder;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->truncate();
        $char = new App\Character(['name'=>'Keehla']);
        $char->stats = json_encode(['dex' => 19, 'eyes' => 'Turquoise']);
        App\User::find(1)->characters()->save($char);
        App\Campaign::find(1)->characters()->save($char);
        $char->save();
    }
}
