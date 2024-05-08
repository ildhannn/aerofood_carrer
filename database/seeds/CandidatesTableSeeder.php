<?php

use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $candidates = App\Models\Candidate::all();
        // foreach ($candidates as $candidate) {
        //     $candidate->educations()->saveMany(factory(App\Models\CandidateEducation::class, 2)->make());
        //     $candidate->experiences()->saveMany(factory(App\Models\CandidateExperience::class, 3)->make());
        //     //apply
        //     $candidate->jobs()->attach(rand(1,63), ['progress'=>rand(1,7), 'status'=>0]);


        //     //saved
        //     $rand = rand(1,5);
        //     for ($i = 1; $i < $rand; $i++) {
        //         $candidate->savedJobs()->attach(rand(1,63));
        //     }
        // 	# code...
        // }
    }
}
