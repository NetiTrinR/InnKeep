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
        App\User::create(['name' => 'Michael', 'email' => 'netitrinr@gmail.com', 'phone' => '1231234567', 'password' => Hash::make('123456')]);
    }
}
