<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Articles::class, function (Faker $faker) {
    return [
        'id' => factory(\App\Articles::class)->create(),
        'title' => $faker->title,
        'description' => $faker->description,
        'author' => $faker->author,
    ];
});
