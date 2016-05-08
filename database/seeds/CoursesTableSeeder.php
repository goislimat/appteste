<?php

use Illuminate\Database\Seeder;
use Projeto\Entities\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();
        
        factory(Course::class, 5)->create();
    }
}
