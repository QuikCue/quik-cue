<?php

namespace App\Services\Product\Application\Data\Transformers;

use App\Services\Product\Domain\Data\Models\Product;
use App\Services\Product\Infrastructure\EloquentModels\ProductEloquentModel;
use Illuminate\Http\Request;

class ProductTransformer
{

    public static function fromRequest(Request $request, ?int $product_id = null): Product
    {
        return new Product(
            id: $product_id,
            name: $request->input('name'),
            description: $request->input('description'),
            type: $request->input('type'),
            status: $request->input('status'),
        );
    }

    public static function fromEloquent(ProductEloquentModel $productEloquentModel): Product
    {
        return new Product(
            id: $productEloquentModel->id,
            name: $productEloquentModel->name,
            description: $productEloquentModel->description,
            type: $productEloquentModel->type,
            status: $productEloquentModel->status,
        );
    }

    public static function toEloquent(Product $product): ProductEloquentModel
    {
        $productEloquentModel = new ProductEloquentModel();

        if ($product->id) {
            $productEloquentModel = ProductEloquentModel::query()->find($product->id);
        }

        $productEloquentModel->name = $product->name;
        $productEloquentModel->description = $product->description;
        $productEloquentModel->type = $product->type;
        $productEloquentModel->status = $product->status;

        return $productEloquentModel;
    }

    public static function toXml(Product $product): string
    {
        // Transform the product to XML format
    }

    public static function toCsv(Product $product): string
    {
        // Transform the product to CSV format
    }
}
