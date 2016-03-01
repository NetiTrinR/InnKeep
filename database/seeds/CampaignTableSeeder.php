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
        App\User::find(1)->mCampaigns()->create(['name'=>'First Campaign']);
        App\Book::find(1)->campaigns()->save(App\Campaign::find(1));
    }
}
