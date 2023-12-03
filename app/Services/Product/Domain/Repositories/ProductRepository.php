<?php

namespace App\Services\Product\Domain\Repositories;

use App\Services\Product\Infrastructure\EloquentModels\ProductEloquentModel;

class ProductRepository
{
    public function create(array $data): ProductEloquentModel
    {
        return ProductEloquentModel::create($data);
    }

    public function update(ProductEloquentModel $product, array $data): bool
    {
        return $product->update($data);
    }

    public function delete(ProductEloquentModel $product): bool
    {
        return $product->delete();
    }

    public function findById(int $id): ?ProductEloquentModel
    {
        return ProductEloquentModel::find($id);
    }

    // Add more methods as needed for fetching products, querying, etc.
}
