<?php

declare(strict_types=1);

namespace App\UseCases\Products;

use App\Const\GlobalConst;
use App\Models\Product;

class GetAllProductsUseCase
{
    public function __invoke(): array
    {
        $products = Product::with(['category', 'supplier', 'product_details.order_details.order'])->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'products' => $products
        ];
    }
}
