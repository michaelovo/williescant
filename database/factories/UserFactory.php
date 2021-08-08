<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\ProductCategory::class, function ( Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'prefix' => $faker->word(),
        'active' => $faker->boolean(50),
    ];
});

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 10),
        'name' => $faker->words(2,true),
        'description' => $faker->sentence(),
        'brand' => $faker->word(),
        'color' => $faker->hexColor(),
        'unit_price' => $faker->randomFloat(2),
        'quantity' =>$faker->numberBetween(1, 100),
        'unit_description' => $faker->words(2, true),
        'sku' => $faker->uuid(),
        'size' => $faker->numberBetween(1, 5),
        'available' => $faker->numberBetween(0, 1),
        'image' => $faker->numberBetween(1, 10)
    ];
});

$factory->define(\App\ReadySale::class, function (Faker $faker) {
    return [
        'fraction' => $faker->randomFloat(2),
        'quantity' =>$faker->numberBetween(1, 100),
        'selling_price' => $faker->randomFloat(),
        'buying_price' => $faker->randomFloat(),
        'sku' => $faker->uuid(),
        'product_id' => $faker->numberBetween(23, 32),
    ];
});
