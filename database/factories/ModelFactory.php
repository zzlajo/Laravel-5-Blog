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

$factory->define(App\User::class, function ($faker) {
    $email = $faker->email;

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => 123456,
        'type' => $faker->randomElement(['standard', 'moderator']),
        'avatar' => '//www.gravatar.com/avatar/'.md5(strtolower(trim($email))),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function ($faker) {
    $title = substr($faker->sentence(rand(3, 7)), 0, -1);

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => '<p>'.$faker->text(2000).'</p>',
        'image' => $faker->imageUrl(750, 346),
        'category_id' => rand(1, 6),
        'author_id' => rand(1, 10),
        'recommend' => $faker->boolean(),
    ];
});

$factory->define(App\Tag::class, function ($faker) {
    $name = $faker->unique()->word;

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'content' => $faker->text(200),
    ];
});

//$factory->define(App\Permission::class, function($faker) {
//
//    return [
//        'name' => $faker->name,
//        'display_name' => $faker->name,
//        'description' => $faker->name,
//    ];
//});
//
//$factory->define(App\Role::class, function($faker) {
//
//    return  [
//        'name' => $faker->name,
//        'display_name' => $faker->name,
//        'description' => $faker->name,
//    ];
//});
