<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BenefitsTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DivitionsTableSeeder::class);
        $this->call(EmploymentTypesTableSeeder::class);
        $this->call(TestsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionChoicesTableSeeder::class);
        $this->call(InterviewFormsTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(MbtisTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StepsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(CandidatesTableSeeder::class);
        $this->call(PapisTableSeeder::class);
    }
}
