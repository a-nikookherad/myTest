<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\category;
use Faker\Generator as Faker;

$factory->define(category::class, function (Faker $faker) {
    return [
        //
		"name" => $faker->unique()->randomElement(["elmi","falsafi","roman","amozeshi","takhayoli"]),
    ];
});
