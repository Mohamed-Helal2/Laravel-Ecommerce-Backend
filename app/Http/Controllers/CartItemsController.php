<?php

namespace App\Http\Controllers;

use App\Models\cart_items;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    
    public function index()
    {
       $cartItems = cart_items::all();
       return response()->json($cartItems,200); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    
    public function destroy(string $id)
    {
        $cartitems=cart_items::find($id);
        $cartitems->delete();
        return response()->json(['message'=>'cart items deleted'],200);
    }
}
