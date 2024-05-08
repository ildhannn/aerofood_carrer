<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new App\Models\User([
            'name' => 'Admin 1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);

        $a->save();

        $a->admin()->save(new App\Models\Admin([
            'user_id' => $a->id,
            'admin_id' => Str::random(10),
            'divition_id' => 1,
            'unit_id' => 1
        ]));

        $c = new App\Models\User([
            'name' => 'Candidate 1',
            'email' => 'candidate@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
        ]);
        $c->save();

        $faker = new Faker;
        $c->candidate()->save(new App\Models\Candidate([
            'user_id' => $c->id,
            'candidate_id' => Str::random(10),
            'phone' => '09088998',
            'photo' => null,
            'why_hire_me' => 'Lorem ipsum',
            'nationality' => 1,
            'province_id' => 1,
            'city_id' => 1,
            'address' => 'Jln jalan, gang jalan',
            'expected_salary' => 10000000,
            'birth_date' => '1993-12-12',
            'fresh_graduate' => 0,
            'summary' => 'adslfkjs s jkfjskdf',
            'cv' => null,
            'other_info' => 'aldsfjaslk dfjlsk fjalkfd '
        ]));

        // App\Models\User::factory(App\Models\User::class, 11)->create()->each(function ($user) {
        //     $user->admin()->save(App\Models\User::factory(App\Models\Admin::class)->make());
        // });;

        // App\Models\User::factory(App\Models\User::class, 650)->create()->each(function ($user) {
		//     $user->candidate()->save(App\Models\User::factory(App\Models\Candidate::class)->make());
		// });;
    }
}
