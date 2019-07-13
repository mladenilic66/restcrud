<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' 	=> $faker->text(30),
        'user_id' 	=> 1,
        'body' 		=> $faker->text(200),
        'image' 	=> $faker->text(10) . '.jpg'
    ];
});
