<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'contents' => $faker->text(250),
    ];
});
