<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'description' => $faker->text,
        'apply_url' => $faker->url,
        'company_id' => function () {
            return factory('App\Company')->create()->id;
        },
        'category_id' => function () {
            return mt_rand(1, 3);
        },
        'city_id' => function () {
            return factory('App\City')->create()->id;
        }
    ];
});
