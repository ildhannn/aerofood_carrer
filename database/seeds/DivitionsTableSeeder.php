<?php

use Illuminate\Database\Seeder;

class DivitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divitions')->insert([ 'divition' => 'In Flight']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Medan']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Pekan Baru']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Bandung']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Jakarta']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Jogja']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Surabaya']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Balikpapan']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Denpasar']);
        DB::table('units')->insert([ 'divition_id' => 1, 'unit' => 'Lombok']);

        DB::table('divitions')->insert([ 'divition' => 'Industrial']);
        DB::table('units')->insert([ 'divition_id' => 2, 'unit' => 'Hospital']);
        DB::table('units')->insert([ 'divition_id' => 2, 'unit' => 'Oil mining & Gas']);
        DB::table('units')->insert([ 'divition_id' => 2, 'unit' => 'Town Management']);
        DB::table('units')->insert([ 'divition_id' => 2, 'unit' => 'Facility Management']);

        DB::table('divitions')->insert([ 'divition' => 'Garuda Support']);
        DB::table('units')->insert([ 'divition_id' => 3, 'unit' => 'Laundry']);
        DB::table('units')->insert([ 'divition_id' => 3, 'unit' => 'Launch']);

        DB::table('divitions')->insert([ 'divition' => 'Commercial']);
        DB::table('units')->insert([ 'divition_id' => 4, 'unit' => 'Commercial']);
    }
}
