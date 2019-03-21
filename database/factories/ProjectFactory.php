<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $randomOrganization = rand(1, 100) >= 75 ? App\Organization::all()->random() : NULL;
    $randomUser;
    if(is_null($randomOrganization)) {
        $randomUser = App\User::all()->random();
    } else {
        $randomUser = rand(1, 100) >= 40 ? App\User::all()->random() : NULL;
    }
    return [
        'id' => $faker->unique()->uuid(),
        'name' => $faker->words($nb = 2, $asText = true),
        'owner_id' => $randomUser->id ?? NULL,
        'owner_organization_id' => $randomOrganization->id ?? NULL,
        'description' => $faker->optional($weight = 0.7)->paragraph($nbSentences = 3, $variableNbSentences = true),
        'avatar' => $faker->optional($weight = 0.5)->randomElement(['1.png', '2.png', '3.png', '4.png', '5.png'])
    ];
});
