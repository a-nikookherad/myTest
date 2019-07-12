<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\post;
use Faker\Generator as Faker;
$factory->define(post::class, function (Faker $faker) {
	$user_id=\App\User::all()->pluck("id")->toArray();
//	dd($user_id);
	return [
        //
		"user_id" => $faker->randomElement($user_id),
		"title" => $faker->text('20'),
		"description" => $faker->text('200'),
    ];
});
