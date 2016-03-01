<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(CampaignTableSeeder::class);
        $this->call(CharacterTableSeeder::class);
        $this->call(JournalTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(ItemTableSeeder::class);

    }
}
