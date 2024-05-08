<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
	$divition_id = $faker->numberBetween(1,4);
	$divition = App\Models\Divition::findorfail($divition_id);
	$unit_id = $faker->numberBetween($divition->units->first()->id, $divition->units->last()->id);
    return [
        'admin_id' => $faker->unique()->randomNumber(8, true),
		'divition_id' => $divition_id,
		'unit_id' => $unit_id
    ];
});
