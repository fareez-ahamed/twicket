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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

/**
 * Ahamed is a user used for testing
 */
$factory->defineAs(App\User::class, 'ahamed', function (Faker\Generator $faker) {
    return [
        'name' => 'Ahamed',
        'email' => 'ahamed@gmail.com',
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
