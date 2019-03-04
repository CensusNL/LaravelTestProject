<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    return [
        'uid' => $faker->unique()->numberBetween(10000,400000),
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->firstName() . ' ' . $faker->lastName,
        'city' => $faker->city,
        'zip' => $faker->postcode,
        'number' => $faker->numberBetween(0, 650) . ($faker->boolean(10) ? $faker->randomLetter : ''),
        'street' => $faker->streetName,
        'country' => $faker->countryCode,
        'phone' => $faker->phoneNumber,
        'company' => $faker->company,
        'job_title' => $faker->jobTitle,
        'ip' => $faker->boolean(25) ? $faker->ipv4 : $faker->ipv6
    ];
});
