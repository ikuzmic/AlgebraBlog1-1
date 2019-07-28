<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

// proba za dinamičko dohvaćanje User Idjeva
$user_ids = App\User::pluck('id');
$random_user_id = array_random($user_ids);

$factory->define(Post::class, function (Faker $faker) use($random_user_id) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->paragraphs(mt_rand(2,10), true),
        'slug' => $faker->slug,
        'user_id' => $random_user_id,
        'cat_id' => mt_rand(1,5),
        'created_at' => $faker->dateTimeBetween('-1 years', '+1 years'),
        'updated_at' => $faker->dateTimeBetween('+0 days', '+2 years')
    ];
});
