<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dashboard;
use Faker\Generator as Faker;

$factory->define(Dashboard::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->sentence(3),
        'is_active' => false,
        'widgets' => null 
    ];
});
