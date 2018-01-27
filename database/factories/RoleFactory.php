<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {

    $name = $faker->word;

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'category_id' => function() {
            return factory('App\Category')->create()->id;
            // return mt_rand(1, 3);
        }
    ];
});
