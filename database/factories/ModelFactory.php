<?php

use Faker\Generator as Faker;


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

$factory->define(App\Entities\Offer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'discount' => $faker->numberBetween(1000, 9000),
        'special_code' => strtoupper(str_random(4)),
        'expiration' => $faker->unixTime,
    ];
});

$factory->define(App\Entities\Recipient::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'is_valid' => $faker->boolean,
    ];
});

$factory->define(App\Entities\Voucher::class, function (Faker $faker) {

    $email = App\Entities\Recipient::all()->random()->email;
    $offer = App\Entities\Offer::all()->random();
    return [
        'promo_code' => $faker->numberBetween(0, 214783647),
        'recipient_email' => function() use ($email) {
            return $email;
        },
        'offer_id' => function() use ($offer) {
            return $offer->id;
        },
        'offer_name'=> function() use ($offer) {
            return $offer->name;
        },
        'expiration'=> function() use ($offer) {
            return $offer->expiration;
        },
        'used_date' => null,
    ];
});