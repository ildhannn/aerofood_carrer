<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i= 1; $i <= 60; $i++) { 
    		DB::table('questions')->insert([ 
	        	'test_id' => 1,
	        	'question'=> ' ',
	        	'type' => 0
	        ]);
    	}

		for ($i= 1; $i <= 96; $i++) { 
    		DB::table('questions')->insert([ 
	        	'test_id' => 2,
	        	'question'=> ' ',
	        	'type' => 0
	        ]);
    	}

        for($i = 1; $i <= 90; $i++){
            DB::table('questions')->insert([
                'test_id' => 3,
                'question' => ' ',
                'type' => 0
            ]);
        }
    }
}
