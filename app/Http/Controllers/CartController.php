<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cart_items;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{

   public function index(){
    $allcart=cart::all();
    return response()->json($allcart,200);
   }

public function allCartItems(){
    $allcartItems=cart_items::all();
    return response()->json($allcartItems,200);
}
     
 public function addtocart(Request $request,$product_id){
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id', 
        'quantity' => 'required|integer|min:1',  
    ]);
    $user = User::find($validated['user_id']); 
    $cart = $user->cart()->first();
    if (!$cart) {
        $cart = cart::create([
            'user_id' => $user->id,
        ]);
    }
    $product = Product::find($product_id);
    $totalPrice = $product->price * $validated['quantity'];
   $cart= Cart_Items::create([
        'cart_id' => $cart->id,
        'product_id' => $product_id,
        'quantity' => $validated['quantity'],
        'price' => $product->price,
        'total' => $totalPrice,
    ]);
    return response()->json([
        'message'=>'sucess',
        'cart' => $cart], 200);
 }
    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
       $cart=Cart::find($id);
       $cart->delete();
       return response()->json(['message'=>'Cart deleted Sucessfully'],200);
    }
}
