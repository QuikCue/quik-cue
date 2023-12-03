<?php

namespace App\Services\Product\Domain\Services;

use App\Services\Product\Domain\Repositories\ProductRepositoryInterface;
use App\Services\Product\Domain\Exceptions\ProductNotFoundException;
use App\Services\Product\Infrastructure\EloquentModels\ProductEloquentModel;

class ProductService
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductById(int $id): ?ProductEloquentModel
    {
        $product = $this->productRepository->findById($id);

        if (!$product) {
            throw new ProductNotFoundException("Product not found with ID: $id");
        }

        return $product;
    }

// Rest of the class implementation
}
