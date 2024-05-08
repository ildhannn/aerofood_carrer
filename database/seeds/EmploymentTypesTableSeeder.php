<?php

use Illuminate\Database\Seeder;

class EmploymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_types')->insert([ 'type' => 'Full Time']);
        DB::table('employment_types')->insert([ 'type' => 'Part Time']);
        DB::table('employment_types')->insert([ 'type' => 'Permanent']);
        DB::table('employment_types')->insert([ 'type' => 'Temporary']);
        DB::table('employment_types')->insert([ 'type' => 'Contract']);
        DB::table('employment_types')->insert([ 'type' => 'Internship']);
        DB::table('employment_types')->insert([ 'type' => 'Freelance']);
    }
}
