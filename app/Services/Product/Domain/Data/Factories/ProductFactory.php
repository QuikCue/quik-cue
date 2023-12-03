<?php

namespace App\Services\Product\Domain\Data\Factories;
use App\Services\Product\Domain\Data\Models\Product;
use Faker\Factory as Faker;

class ProductFactory
{

    /**
     * @param array|null $attributes
     * @return Product
     */
    public function execute(array $attributes = null): Product
    {
        $attributes = $attributes ?: [];

        $faker = Faker::create();

        $defaults =  [
            'id' => null,
            'name' => $faker->word(),
            'description' => $faker->paragraph(),
            'type' => $faker->numberBetween(1, 5),
            'status' => $faker->numberBetween(1, 5)
        ];

        $attributes = array_replace($defaults, $attributes);

        return new Product(
            id: $attributes['id'],
            name: $attributes['name'],
            description: $attributes['description'],
            type: $attributes['type'],
            status: $attributes['status']
        );

    }
}
