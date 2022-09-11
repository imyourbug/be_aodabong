<?php

declare(strict_types=1);

namespace App\UseCases\Products;

use App\Const\GlobalConst;
use App\Models\Product;
use Exception;

class CreateProductUseCase
{
    public function __invoke($params): array
    {
        try {
            $product = Product::create($params);

            return [
                'status' => GlobalConst::STATUS_OK,
                'product' => $product
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CREATE_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
