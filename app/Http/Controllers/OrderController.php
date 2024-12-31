<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
       $allorders=Order::all();
       return response()->json($allorders,200);
    }


    public function store(Request $request, $product_id)
    {
        //     $validatedorder= $request->validate([
        //         'user_id'=>'required|exists:users,id',
        //         'status'=>'required'
        //     ]);
        //    $order=Order::create($validatedorder);
        //  $new=  $order->product()->attach($request->product_id);
        //    return response()->json(['message'=>'ordere created Sucessfully',
        //    'order'=>$new],201);
    }
    public function addorder(Request $request, $product_id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required',
            'price' => 'required',
            'quantity' => 'nullable'
        ]);
        $order = Order::create($validatedData);
       // $order->product()->attach($request->product_id);
       $order->product()->attach($product_id, [
        'quantity' => $validatedData['quantity'],
        'price' => $validatedData['price'], // Snapshot of product price
    ]);
        return response()->json([
            'message' => 'ordere created Sucessfully',
            'order' => $order
        ], 201);
    }

    public function show(string $id)
    {
        $order=Order::find($id);
        if($order){
            return response()->json(['order'=>$order],200);
        }
        return response()->json(['error'=>'this order not exists'],404);
    }


    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $validatedorder = $request->validate([
                'status' => 'sometimes|string',
                'total' => 'sometimes|decimal',
                'quantity' => 'sometimes'
            ]);
            $order->update($validatedorder);
            return response()->json([
                'message' => 'order updated sucessfully',
                'order' => $order
            ], 201);
        }
        return response()->json(['error'=>'this order not exists'],400);
    }


    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return response()->json(['message' => 'order Deleted Sucessfully'], 200);
        }
        return response()->json(['error' => 'this order not exist'], 404);
    }
}
