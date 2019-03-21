<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$defaultPassword = bcrypt('asda');

$factory->define(App\User::class, function (Faker $faker) use (&$defaultPassword) {
    return [
        'id' => $faker->unique()->uuid(),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $defaultPassword,
        'remember_token' => str_random(10),
    ];
});
