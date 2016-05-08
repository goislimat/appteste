<?php

use Illuminate\Database\Seeder;
use Projeto\Entities\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::truncate();
        
        factory(Subject::class, 30)->create();
    }
}
