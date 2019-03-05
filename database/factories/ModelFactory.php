<?php

// use Faker\Provider\en_CA\Address;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $faker = Faker\Factory::create(('en_CA'));
    $al = array('ETO','EU');
    return [
        'admin_level' => $al[rand(0,1)],
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'team_id' => null,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->buildingNumber,
        'city' => $faker->city,
        'province' => $faker->province,
        'zip_code' => $faker->postcode,
        'country' => 'Canada',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Person::class, function (Faker\Generator $faker) {

    $faker = Faker\Factory::create(('en_CA'));

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birth_date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'membership_id' => $faker->creditCardNumber,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->buildingNumber,
        'city' => $faker->city,
        'province' => $faker->province,
        'zip_code' => $faker->postcode,
        'country' => 'Canada',

    ];
});

$factory->define(App\ActivePerson::class, function (){
    $type = array("Player", "Player", "Player", "Player", "Player", "Player", "Player", "Player", "Player",
    "Player", "Player", "Player", "Player", "Player", "Coach", "Helper");
    return[
        'type' => $type[rand(1,15)],
        'category' => rand(1,5),
    ];
});

$factory->define(App\Team::class, function(Faker\Generator $faker){

    $faker = Faker\Factory::create(('en_CA'));

    return[
        'name' => 'The '.$faker->city.' '.$faker->jobTitle.'s',


    ];
});
