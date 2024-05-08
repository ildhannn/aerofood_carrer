<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Candidate::class, function (Faker $faker) {
	$province_id = $faker->numberBetween(1,34);
	$province = App\Models\Province::findorfail($province_id);
	$city_id = $faker->numberBetween($province->cities->first()->id, $province->cities->last()->id);

    return [
        'candidate_id' => $faker->unique()->randomNumber(8, true),
		'phone' => $faker->phoneNumber,
		'photo' => null,
		'why_hire_me' => $faker->text(150),
		'nationality' => 1,
		'country' => $faker->country,
		'province_id' => $province_id,
		'city_id' => $city_id,
		'address' => $faker->address,
		'experience' => (int) $faker->numberBetween(1,15),
		'expected_salary' => (int) $faker->numberBetween(1,15).'000000',
		'birth_date' => $faker->date('Y-m-d', '-15 years'),
		'fresh_graduate' => 0,
		'summary' => $faker->text(),
		'cv' => null,
		'other_info' => $faker->text()
    ];
});
