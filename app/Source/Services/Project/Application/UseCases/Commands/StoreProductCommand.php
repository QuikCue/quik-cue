<?php

namespace App\Services\Product\Application\UseCases\Features;

use App\Infrastructure\Units\Feature;
use App\Services\Product\Domain\Data\Models\Product;
use App\Services\Product\Domain\Jobs\CreateProductRecordJob;
use App\Services\Product\Domain\Jobs\ValidateProductDataJob;

class AddProductFeature extends Feature
{

    public function handle(Product $product)
    {

        $this->run(ValidateProductDataJob::class, ['product' => $product]);

        return $this->run(CreateProductRecordJob::class, ['product' => $product]);

    }

    public function execute(): Product
    {
        authorize('store', $this->policy);
        if (CompanyEloquentModel::query()->where('vat', $this->company->vat)->exists()) {
            throw new VatAlreadyUsedException();
        }

        return $this->repository->store($this->company);
    }

}
