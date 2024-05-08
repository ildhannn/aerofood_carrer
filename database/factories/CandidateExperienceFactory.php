<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CandidateExperience::class, function (Faker $faker) {
	$province_id = $faker->numberBetween(1,34);
	$province = App\Models\Province::findorfail($province_id);
	$city_id = $faker->numberBetween($province->cities->first()->id, $province->cities->last()->id);
    return [
		'position' => $faker->jobTitle,
		'company' => $faker->company,
		'start_date' => $faker->dateTimeBetween('-15 years', $endDate = '-10 years', $timezone = null),
		'end_date' => $faker->dateTimeBetween('-9 years', $endDate = 'now', $timezone = null),
		'nationality' => 1,
		'aboard_location' => null,
		'province_id' => $province_id,
		'city_id' => $city_id,
		'field_id' => $faker->numberBetween(1,14),
		'salary' => (int) $faker->numberBetween(1,15).'000000',
		'description' => $faker->text(400)
    ];
});
