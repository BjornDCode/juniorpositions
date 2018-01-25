<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {

    $name = $faker->country;

    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
