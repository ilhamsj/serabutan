<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=10),
        'title' => $faker->sentence,
        'content' => $faker->text($maxNbChars = 300),
        'image' => $faker->randomElement(
            [
                'a69A1VNE44wFzVQBUBElx3QKYJW7zBR6iWFXCcUj.jpeg',
                '1S6Rhi1vTcO5vXCYac4DUfkV4UEClT6bsrAcHWU9.jpeg'
            ]
        )
    ];
});
