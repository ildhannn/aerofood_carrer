<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CandidateEducation::class, function (Faker $faker) {
	$qualification = ['SMA Sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3', 'Lainnya'];
    return [
		'institute' => $faker->company,
		'graduate_date' => $faker->date('Y-m-d', '-5 years'),
		'qualification' => $faker->numberBetween(0,7),
		'field_id' => $faker->numberBetween(1,14),
		'major' => 'Sistem Informasi',
		'GPA' => $faker->randomFloat(2, 2, 4),
		'GPA_max' => 4.00,
		'info' => $faker->text(400)
    ];
});
