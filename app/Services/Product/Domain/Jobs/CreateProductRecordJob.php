<?php

namespace App\Services\Product\Domain\Jobs;

use App\Infrastructure\Units\Job;
use App\Services\Product\Infrastructure\EloquentModels\ProductEloquentModel;

class CreateProductRecordJob extends Job
{

    /** @var ProductEloquentModel  */
    protected ProductEloquentModel $eloquentModel;

    /**
     * @param ProductEloquentModel $eloquentModel
     */
    public function __construct(ProductEloquentModel $eloquentModel)
    {
        $this->eloquentModel = $eloquentModel;
    }

    public function handle()
    {
        $this->eloquentModel->save();
    }
}
