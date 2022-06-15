<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderList()
    {
        $orderItems = \Order::getContent();
        // dd($orderItems);
        return view('order', compact('orderItems'));
    }

    public function addToOrder(Request $request)
        {

            \Order::add(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        }
}
