<?php

use Illuminate\Database\Seeder;

class BenefitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('benefits')->insert([ 'benefit' => 'Dental Insurance']);
        DB::table('benefits')->insert([ 'benefit' => 'Double Pay']);
        DB::table('benefits')->insert([ 'benefit' => 'Education allowance']);
        DB::table('benefits')->insert([ 'benefit' => 'Five-day work week']);
        DB::table('benefits')->insert([ 'benefit' => 'Six-day work week']);
        DB::table('benefits')->insert([ 'benefit' => 'Flexible working hours']);
        DB::table('benefits')->insert([ 'benefit' => 'Housing allowance']);
        DB::table('benefits')->insert([ 'benefit' => 'Life insurance']);
        DB::table('benefits')->insert([ 'benefit' => 'Performance bonus']);
        DB::table('benefits')->insert([ 'benefit' => 'Overtime pay']);
        DB::table('benefits')->insert([ 'benefit' => 'Medical Insurance']);
        DB::table('benefits')->insert([ 'benefit' => 'Transportation allowance']);
        DB::table('benefits')->insert([ 'benefit' => 'Travel allowance']);
        DB::table('benefits')->insert([ 'benefit' => 'Pension']);
    }
}
