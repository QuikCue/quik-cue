<?php

namespace App\Services\Product\Presentation\API;

use App\Infrastructure\Units\Controller;
use App\Services\Product\Application\Data\Transformers\ProductTransformer;
use App\Services\Product\Application\UseCases\Features\AddProductFeature;
use App\Services\Product\Application\UseCases\Features\AddDummyProductFeature;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $newProduct = ProductTransformer::fromRequest($request);
        return $this->serve(AddProductFeature::class, ['product' => $newProduct]);
    }

    public function seed(Request $request): JsonResponse
    {
        return $this->serve(AddDummyProductFeature::class);
    }
}
