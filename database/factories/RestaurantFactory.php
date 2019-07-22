<?php

namespace App\Database\factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
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

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'address' => $faker->address,
        'description' => $faker->text,
        'work_time_from' => $faker->time(),
        'work_time_to' => $faker->time(),
        'phone_number' => $faker->phoneNumber,
        'URL' => $faker->url
    ];
});