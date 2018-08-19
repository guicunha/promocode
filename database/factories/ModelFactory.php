<?php

use Faker\Generator as Faker;


$factory->define(App\Entities\Offer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'discount' => $faker->numberBetween(1000, 9000),
        'special_code' => strtoupper(str_random(4)),
        'expiration' => $faker->unixTime,
        'is_enabled'    => $faker->boolean,
        'is_multiplier' =>  $faker->boolean
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

    $email = App\Entities\Recipient::all()->random();
    $offer = App\Entities\Offer::all()->random();
    return [
        'promo_code' => $faker->numberBetween(0, 214783647),
        'email' => function() use ($email) {
            return $email->email;
        },
        'recipient_name' => function() use ($email) {
            return $email->last_name .", ". $email->first_name;
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
        'used_date' => $faker->unixTime,
    ];
});