<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=10),
        'title' => $faker->sentence,
        'content' => $faker->text($maxNbChars = 300),
        'image' => $faker->randomElement([
                '2x06ZwF1ttoCgac5KMlUyNzPghDyuA3uOUrHPlNZ.png',
                '6QP28txF6tp0PajrQZnWFgVjOd1X0pSvyIdKM9ui.png',
                '7A2sYrBtHReFiDnUohHy3EDS8itSSwlzbu3DtCMo.png',
                'AHN2fU1pKeALTQ9S7DgaVVpGXwrhFTy2M0YPTsUh.png',
                'bY0Udp3s45gOKEq0apTZsAOG34Q6iOniElMhXbTE.png',
                'hsbduPxaZhAwi8phwLlEY1dTjWzka3ykVdqcJFuy.png',
                'ipWFmpdiqUmDUYmFzo5v7j8w2FhJXpsYJ1fkQcBN.png',
                'J9eAA9JSkcomu3lGiugKOzfYB0QLlMFj2ImhvrKk.png',
                'MF19Qeha0gu9tSFES5Lfk88tdAErPBNuudJfcX06.png',
                'mwOYtmdr45RQzOOu3x9zz1WRmTO1HpnvXqErTjYj.png',
                'nLACcCpLTTliJ2ZH8llHxqoFm3x7JfR9oayamZ1a.png',
                'qHm6UWV9JvQ0BHznkZrF5fgo164duZN0zlTbalOT.jpeg',
                'uEBWW9OTD6C1Mmj7Bv08Zzx27FlG8i57PfZNVegg.png',
            ]
        ),
        'category' => $faker->unique()->word,
    ];
});
