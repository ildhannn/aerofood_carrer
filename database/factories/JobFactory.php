<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job::class, function (Faker $faker) {

	$province_id = $faker->numberBetween(1,34);
	$province = App\Models\Province::findorfail($province_id);
	$city_id = $faker->numberBetween($province->cities->first()->id, $province->cities->last()->id);

	$field_id = $faker->numberBetween(1,14);
	$field = App\Models\Field::findorfail($field_id);
	$field_specialization_id = $faker->numberBetween($field->specializations->first()->id, $field->specializations->last()->id);

    return [
        'job_id' => $faker->unique()->randomNumber(8, true),
		'preq' => $faker->text(10),
		'preq_file' => $faker->text(10),
		'title' => $faker->jobTitle,
		'description' => $faker->text(400),
		'min_education' => $faker->numberBetween(0,7),
		'min_age' => $faker->numberBetween(22,50),
		'max_age' => $faker->numberBetween(22,50),
		'min_experience' => $faker->numberBetween(0,15),
		'min_salary' => (int) $faker->numberBetween(0,5). '000000',
		'max_salary' => (int) $faker->numberBetween(6,15). '000000',
		'start_date' => $faker->dateTimeBetween('-15 years', $endDate = '-10 years', $timezone = null),
		'end_date' => $faker->dateTimeBetween('-9 years', $endDate = 'now', $timezone = null),
		'status' => $faker->numberBetween(0,2),
		'province_id' => $province_id,
		'city_id' => $city_id,
		'field_id' => $field_id,
		'field_specialization_id' => $field_specialization_id,
		'created_by' => $faker->numberBetween(1,11)
    ];
});
