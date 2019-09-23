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
                '74Z2zBojSIcdQbfe7iCrSG9sHso2e96e6ONcZF3l.png',
                'a69A1VNE44wFzVQBUBElx3QKYJW7zBR6iWFXCcUj.jpeg',
                'FeXsmrVXDz79c0wBIoBsMJeZsJHbcGOtagf3tbtU.jpeg',
                'mrhqN41eXC8oC04DlNCnRtASAt07YJrpkGg5tWEQ.jpeg',
                'voGbpWPU837DsLT8S6gcQHnuEID9IxSfo39pGTdo.gif'
            ]
        )
    ];
});
