<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'created_at' => now(),
        'updated_at' => $faker->dateTimeBetween('+0 days', '+2 years')
    ];
});
