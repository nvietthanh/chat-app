<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\ProductBasicResource;
use App\Http\Resources\User\ProductDetailResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getById(Request $request)
    {
        $productIds = $request->product_ids ?? [];

        $products = Product::whereIn('id', $productIds)->get();

        return ProductBasicResource::collection($products);
    }

    public function show(string $id)
    {
        $product = Product::whereId($id)
            ->with(['images', 'branch', 'category'])
            ->firstOrFail();

        return ProductDetailResource::make($product);
    }
}
