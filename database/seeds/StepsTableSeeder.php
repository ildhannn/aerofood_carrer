<?php

use Illuminate\Database\Seeder;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([ 'name' => 'Prescreening Video Interview']);
        DB::table('steps')->insert([ 'name' => 'Tes Online']);
        DB::table('steps')->insert([ 'name' => 'Interview Human Capital']);
        DB::table('steps')->insert([ 'name' => 'Interview User 1 (Manajer)']);
        DB::table('steps')->insert([ 'name' => 'Interview User 2 (VP/GM/Direksi)']);
        DB::table('steps')->insert([ 'name' => 'Interview Direksi']);
        DB::table('steps')->insert([ 'name' => 'Interview Human Capital Head Office']);
        DB::table('steps')->insert([ 'name' => 'Medical Check Up']);
        DB::table('steps')->insert([ 'name' => 'Offering']);
        DB::table('steps')->insert([ 'name' => 'Join Date']);
    }
}
