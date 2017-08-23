<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    $title = $faker->sentence(3);
    $slug = str_slug($title);
    
    return [
        'title' => $title,
        'slug' => $slug,
//        'path' => $faker->imageUrl($width = 500, $height = 500),
        'category_id' => mt_rand(1, 4),
        'image_id' => mt_rand(1, 10),
    ];
});

$factory->define(App\File::class, function (Faker\Generator $faker) {

    
    $slug = $faker->sentence(3);
    $slug = str_slug($slug);
    
    return [
        'title' => $slug,
        'path' => $faker->imageUrl($width = 500, $height = 500),
        'type' => 'image',
        'category_id' => mt_rand(1, 4),
    ];
});