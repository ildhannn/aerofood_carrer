<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Pvi::class, function (Faker $faker) {
    return [
        'question' => $faker->realText($faker->numberBetween(10,200)).'?'
    ];
});
