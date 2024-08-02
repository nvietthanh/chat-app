<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\ProductBasicResource;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function product()
    {
        $products = Product::all();

        return ProductBasicResource::collection($products);
    }
}
