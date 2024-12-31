<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allproduct = Product::all();
        return response()->json($allproduct, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id|integer',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1'
        ]);
        $product = Product::create($validatedData);
        return response()->json([
            'status' => true,
            'message' => 'Product Added Sucessfully',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id|integer',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'quantity' => 'sometimes|integer|min:1'
        ]);
        $product = Product::find($id);
        if ($product) {
            $product->update($validatedData);
            return response()->json($product, 200);
        }
        return response()->json(['message' => 'this product not exist'], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'deleted Sucess'], 200);
        }
        return response()->json(['message' => 'this product not exist'], 400);
    }

    public function getProductCategories($product_id)
    {
        $categories = Product::find($product_id)->category;
        return response()->json($categories, 200);
    }


    public function getCategoriesProduct($category_id)
    {
        $category = Category::find($category_id);

        if ($category) {
            $products = $category->products; // Fetch products related to this category
            return response()->json(['status' => 'Success', 'data' => $products], 200);
        }

        return response()->json(['status' => 'Fail', 'message' => 'Category not found'], 404);
    }
}
