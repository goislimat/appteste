<?php

use Illuminate\Database\Seeder;
use Projeto\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        User::create([
            'name' => 'teste',
            'username' => 'ADMIN2016000001',
            'email' => 'teste@teste.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'type' => 3,
            'ingress_year' => 2016,
        ]);
        
        factory(User::class, 5)->create();
    }
}
