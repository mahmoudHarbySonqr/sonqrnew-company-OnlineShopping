<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Store;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory -> define( Store::class , function ( Faker $faker ) {
    return [
        'name'      => $faker ->              name        ,
        'phone'     => $faker -> unique( ) -> phoneNumber ,
    ];
});

$factory -> afterCreating( Store::class , function ( $Store , $faker ) {
    $Store -> addresses( ) -> create( [
        'longitude' => $faker -> unique( ) -> longitude   ,
        'latitude'  => $faker -> unique( ) -> latitude    ,
    ] );
});
