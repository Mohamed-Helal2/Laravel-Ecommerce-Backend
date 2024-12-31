<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategories=Category::all();
        return response()->json($allCategories,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|unique:categories,name|max:255',
            'description'=>'nullable|string'
        ]);
        $categoryData=Category::create( $validatedData);
       // return response()->json($categoryData,201);
        return response()->json([
            'sucess'=>true,
            'message' => 'Category created successfully.',
             'data'=>$categoryData
        ],201);
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
        $categoryData=Category::find($id);
        $validatedData=$request->validate([
            'name'=>'required|unique:categories,name|max:255',
            'description'=>'nullable|string'
        ]);
       
        $categoryData->update($validatedData);
        return response()->json(['message'=>'Updated Sucessfully','data'=>$categoryData],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoryData=Category::find($id);
        if($categoryData->products()->exists()){
            return response()->json([
                'status'=>false,
                'message'=>'Category cannot be deleted because it is associated with products.'],400);
        }
        $categoryData->delete();
        return response()->json(['message'=> 'Deleted'],200);
    }
}
