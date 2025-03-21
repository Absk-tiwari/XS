<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(Request $request)
    {
      
        $order = Order::create([
            'name' => $request->name,
            'phone_num' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'deliveryaddress' => $request->deliveryaddress, 
            'payment_method' => $request->payment_method,
            'orderitems'=> json_encode($request->orderItems),
        ]);

        return [
            'status' => true,
            'message' => 'Order placed successfully!',
            'order' => $order
        ];
    }
}
