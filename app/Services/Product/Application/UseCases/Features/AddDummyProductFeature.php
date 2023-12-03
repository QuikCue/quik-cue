<?php

namespace App\Services\Product\Application\UseCases\Features;

use App\Infrastructure\Units\Feature;
use App\Services\Product\Application\Data\Transformers\ProductTransformer;
use App\Services\Product\Domain\Data\Factories\ProductFactory;
use App\Services\Product\Domain\Data\Models\Product;
use App\Services\Product\Domain\Jobs\CreateProductRecordJob;
use App\Services\Product\Domain\Jobs\ValidateProductDataJob;

class AddDummyProductFeature extends Feature
{

    public function handle(int $quantity = 1)
    {

        $productFactory = new ProductFactory();
        $product = $productFactory->execute();

        $this->run(ValidateProductDataJob::class, ['product' => $product]);

        return $this->run(CreateProductRecordJob::class, ['eloquentModel' => ProductTransformer::toEloquent($product)]);

    }

}
