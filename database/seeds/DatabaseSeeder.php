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
        $this->call(TagTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TemplateTableSeeder::class);
        $this->call(CampaignTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(CharacterTableSeeder::class);
        $this->call(JournalTableSeeder::class);

    }
}
