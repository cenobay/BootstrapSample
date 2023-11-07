<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'buyer_name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'numeric',
            'mobile_number' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
        ]);

        // Set a default price if it doesn't exist in the $data array
        if (!isset($data['price'])) {
            $data['price'] = 0.00;
        }

        Order::create($data);
        return redirect()->back()->with('success', 'Order placed successfully.');
    }
}
