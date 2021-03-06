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
        DB::statement('set foreign_key_checks=0');
        
        $this->call(CoursesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(UsersSubjectsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        
        DB::statement('set foreign_key_checks=1');
    }
}
