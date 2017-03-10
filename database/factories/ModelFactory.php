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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'pseudo' => $faker->company,
        'picture' => $faker->imageUrl($width = 600, $height = 600),
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'link' => $faker->url,
        'describe' => $faker->realText($faker->numberBetween(100,150)),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    //$users = App\User::select('id')->get();
    /**
     * TODO : get list of ids to display in $users
     */
    return [
        'content' => $faker->realText($faker->numberBetween(80,141)),
        //'id_user' => $faker->randomElement($users),
    ];
});
