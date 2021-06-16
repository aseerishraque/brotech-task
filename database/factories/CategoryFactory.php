<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $random = $faker->randomElement($array = array (0, 1));
    if ($random == 1)
        $parent_id = $faker->numberBetween($min = 1, $max = 10);
    else
        $parent_id = null;
    return [
        'name' => $faker->word,
        'parent_id' => $parent_id
    ];
});
