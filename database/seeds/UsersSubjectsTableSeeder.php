<?php

use Illuminate\Database\Seeder;
use Projeto\Entities\User;
use Projeto\Entities\Subject;

class UsersSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_subjects')->truncate();
        
        for($i = 0; $i < 100; $i++)
        {
            while(true)
            {
                $user = User::all()->random();
                if($user->type != 3)
                {
                    break;
                }
            }
            
            while(true)
            {
                $subject = Subject::all()->random();
                if($subject->course_id == $user->course_id || $user->type == 2)
                {
                    break;
                }
            }
            
            $user->subjects()->attach($subject->id, ['year_semester' => rand(2015, 2016) . '/' . rand(1, 2)]);
        }
    }
}
