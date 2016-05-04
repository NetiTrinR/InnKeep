<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
            'name' => 'Michael',
            'email' => 'netitrinr@gmail.com',
            'phone' => '1234156789',
            'password' => Hash::make('123456'),
            'options' => json_encode([
                'characterViewable' => true,
                'inventoryViewable' => false,
                'journalViewable' => true,
            ])
        ]);
    }
}
