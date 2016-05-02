<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber
    ];
});

$factory->define(App\Campaign::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->define(App\Character::class, function (Faker\Generator $faker) {
    return [
        'stats' => [
            'name' => $faker->name,
            'eyes' => $faker->colorName,
            'age' => rand(15, 80),
            'strength' => rand(0, 20),
            'dexterity' => rand(0, 20),
            'constitution' => rand(0, 20),
            'intelligence' => rand(0, 20),
            'wisdom' => rand(0, 20),
            'charisma' => rand(0, 20),
        ]
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->companySuffix,
        'description' => $faker->paragraph
    ];
});

$factory->define(App\Journal::class, function (Faker\Generator $faker) {
    return [
        'entry' => $faker->paragraph
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

