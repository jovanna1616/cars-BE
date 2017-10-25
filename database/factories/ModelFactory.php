<?php

use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
    	'mark' => $faker->name,
        'model' => $faker->name,
        'year' => $faker->dateTime(),
        'max_speed' => $faker->numberBetween($min = 50, $max = 300),
        'is_automatic' => $faker->boolean($chanceOfGettingTrue = 50),
        'engine' => $faker->firstName($gender = null|'male'|'female'),
        'number_of_doors' => $faker->numberBetween($min = 2, $max = 5),
    ];
});
