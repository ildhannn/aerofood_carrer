<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\Job::factory(App\Models\Job::class, 63)->create()->each(function ($job) {
        //     $job->steps()->attach(1, ['due_date'=>'2017-5-12']);
        //     $job->steps()->attach(2, ['due_date'=>'2017-6-12']);
        //     $job->steps()->attach(3, ['due_date'=>'2017-7-12']);
        //     $job->steps()->attach(4, ['due_date'=>'2017-8-12']);
        //     $job->steps()->attach(5, ['due_date'=>'2017-9-12']);
        //     $job->steps()->attach(6, ['due_date'=>'2017-10-12']);
        //     $job->steps()->attach(7, ['due_date'=>'2017-11-12']);
        //     $job->steps()->attach(8, ['due_date'=>'2017-12-19']);
        //     $job->steps()->attach(9, ['due_date'=>'2017-12-22']);
        //     $job->steps()->attach(10, ['due_date'=>'2017-12-23']);

        //     $rand = rand(1, 7);
        //     for ($i = 1; $i <= $rand; $i++) {
        //         $job->employmentTypes()->attach($i);
        //     }

        //     $rand = rand(1, 14);
        //     for ($i = 1; $i <= $rand; $i++) {
        //         $job->benefits()->attach($i);
        //     }

        //     $j = 1;
        //     for ($i = 3; $i <= 7; $i++) {
        //         $job->interviews()->save(App\Models\JobInterview::create([
        //             'job_id' => $job->id,
        //             'interviewer' => 'Interview '.$j,
        //             'step_id' => $i
        //         ]));
        //         $j++;
        //     }

        //     $job->pvis()->saveMany(App\Models\Job::factory(App\Models\Pvi::class, 5)->make());

		// });;
    }
}
