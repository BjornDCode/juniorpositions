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
        'role_id' => function () {
            return factory('App\Role')->create()->id;
        },
        'city_id' => function () {
            return factory('App\City')->create()->id;
        }
    ];
});
