<?php

declare(strict_types=1);

namespace App\UseCases\Products;

use App\Const\GlobalConst;
use App\Models\Product;

class GetAllProductsUseCase
{
    public function __invoke(): array
    {
        $products = Product::with("category")->with("supplier")->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'products' => $products
        ];
    }
}
