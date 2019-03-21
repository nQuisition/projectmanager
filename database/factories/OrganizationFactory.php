<?php

use Faker\Generator as Faker;

$factory->define(App\Organization::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->uuid(),
        'name' => $faker->words($nb = 2, $asText = true),
        'location' => $faker->country,
        'avatar' => $faker->optional($weight = 0.5)->randomElement(['1.png', '2.png', '3.png', '4.png', '5.png'])
    ];
});
