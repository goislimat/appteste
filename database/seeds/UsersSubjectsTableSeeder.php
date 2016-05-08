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
        
        for($i = 0; $i < 10; $i++)
        {
            while(true)
            {
                $user = User::all()->random();
                if($user->type == 1)
                {
                    break;
                }
            }
            
            while(true)
            {
                $subject = Subject::all()->random();
                if($subject->course_id == $user->course_id)
                {
                    break;
                }
            }
            
            $user->subjects()->attach($subject->id, ['year_semester' => rand(2011, 2016) . '/' . rand(1, 2)]);
        }
    }
}
