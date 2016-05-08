<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Projeto\Entities\Course::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'type' => $faker->randomElement(array('Bacharelado', 'Licenciatura', 'Tecnólogo')),
        'abbr' => $faker->stateAbbr,
    ];
});

$factory->define(Projeto\Entities\User::class, function (Faker\Generator $faker) {
    $hash = [
        'name' => $faker->name,
        'user' => str_random(10),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'type' => $faker->numberBetween(1, 3),
        'ingress_year' => $faker->numberBetween(2011, 2016),
        'remember_token' => str_random(10),
    ];
    
    if($hash['type'] == 1)
    {
        $hash['course_id'] = Projeto\Entities\Course::all()->random()->id;
    }
    
    return $hash;
});

$factory->define(Projeto\Entities\Subject::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(3, true),
        'semester' => $faker->numberBetween(1, 10),
        'course_id' => Projeto\Entities\Course::all()->random()->id,
    ];
});

