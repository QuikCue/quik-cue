<?php

namespace App\Services\Product\Domain\Jobs;


use App\Infrastructure\Units\Job;
use App\Services\Product\Domain\Data\Models\Product;

class ValidateProductDataJob extends Job
{
    /** @var Product  */
    protected Product $product;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function handle()
    {
        // Validation logic here
    }
}
