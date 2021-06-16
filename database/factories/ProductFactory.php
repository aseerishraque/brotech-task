<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categoryArray = \App\Category::pluck('id')->toArray();
    return [
        'category_id' => $faker->randomElement($categoryArray),
        'name' => $faker->firstName('male'|'female'),
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'details' => $faker->text($maxNbChars = 50)
    ];
});
