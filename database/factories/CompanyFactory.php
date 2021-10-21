<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Type;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'title' => $faker->company(),
        'description' => $faker->paragraph(3),
        'logo' =>  $faker->imageUrl(640, 480, 'cats'),
        // kadangi si lentele turi rysi su Type, siejama eilute nurodoma taip
        'type_id' => factory(Type::class)->create()->id
    ];
});
