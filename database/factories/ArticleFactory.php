<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' 	=> $faker->text(50),
        'user_id' 	=> 1,
        'body' 		=> $faker->text(500),
        'image' 	=> $faker->numberBetween(1, 20) . '.jpeg'
    ];
});
