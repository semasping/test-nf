<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'body' => $faker->realText(500),
        'category_id' => factory(\App\Category::class),
    ];
});
