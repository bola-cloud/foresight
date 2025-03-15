<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get all products with their categories
     */
    public function index($category_id)
    {
        $products = Product::where('category_id', $category_id)->with('category')->get();

        return response()->json([
            'success' => true,
            'data' => $products,
        ], 200);
    }

    /**
     * Get all categories
     */
    public function categories()
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ], 200);
    }
}
