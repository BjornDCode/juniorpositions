<?php

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {

    $name = $faker->city;

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'country_id' => function() {
            return factory('App\Country')->create()->id;
        }
    ];
});
