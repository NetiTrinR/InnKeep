<?php

use Illuminate\Database\Seeder;

class CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->truncate();
        App\User::find(1)->dmCampaigns()->create(['name'=>'First Campaign']);
        App\Campaign::find(1)->tags()->save(App\Tag::find(1));
    }
}
