<?php

namespace App\Services\Product\Infrastructure\Seeders;

use App\Services\Product\Domain\Repositories\ProductRepository;

class ProductSeeder
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function seedDummyProducts(int $quantity): void
    {
        // Generate and insert dummy product records into the database
        for ($i = 0; $i < $quantity; $i++) {
            $data = [
                'name' => 'Dummy Product ' . ($i + 1),
                'description' => 'This is a dummy product',
                'type' => 1,
                'status' => 1,
            ];

            $this->productRepository->create($data);
        }
    }
}
