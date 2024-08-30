<?php

namespace App\Http\Controllers\Product;

use App\Domain\Product\DTO\GetProductsData;
use App\Domain\Product\Gateways\ProductGateway;
use App\Domain\Product\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return Collection
     */
    public function index(Request $request): Collection
    {
        return (new ProductGateway())->getAllProducts(
            new GetProductsData(
                $request->get('filter'),
                $request->get('limit') ?? Product::PRODUCT_LIMIT,
                $request->get('offset') ?? Product::PRODUCT_OFFSET
            )
        );
    }
}
