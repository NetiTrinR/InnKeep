<?php

use Illuminate\Database\Seeder;

class JournalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('journals')->truncate();
        $j = new App\Journal;
        $j->user_id = App\User::find(1)->id;
        $j->campaign_id = App\Campaign::find(1)->id;
        $j->character_id = App\Character::find(1)->id;
        $j->entry = "I stole some money today.";
        $j->save();

        $j = new App\Journal;
        $j->user_id = App\User::find(1)->id;
        $j->campaign_id = App\Campaign::find(1)->id;
        $j->entry = "Website is progressing nicely. Look here, I've already finished seeding.";
        $j->save();
    }
}
