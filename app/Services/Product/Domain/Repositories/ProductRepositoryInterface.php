<?php

namespace App\Services\Product\Domain\Repositories;

use App\Services\Product\Infrastructure\EloquentModels\ProductEloquentModel;

interface ProductRepositoryInterface
{
    public function create(array $data): ProductEloquentModel;
    public function update(ProductEloquentModel $product, array $data): bool;
    public function delete(ProductEloquentModel $product): bool;
    public function findById(int $id): ?ProductEloquentModel;

}
