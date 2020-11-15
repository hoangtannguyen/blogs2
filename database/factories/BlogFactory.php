<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->name,
        'content' => $faker->name,
        'title_two' => $faker->name,
        'category_id' => rand(0,10),
    ]; 
});
