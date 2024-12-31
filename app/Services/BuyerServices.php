<?php

namespace App\Services;

use App\Models\Orders;
use App\Models\Products;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;

class BuyerServices
{
    public static function singleCheckOut($quantity_count, $product_id)
    {
        $product = Products::find($product_id);
        $order = Orders::create([
            'user_id' => Auth::user()->id,
            'status' => 'waiting_payment', // waiting_payment | failed | confirmed | delivery | finished
            'grand_total' => $quantity_count * $product->price // grand_total
        ]);
        OrderDetails::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity_count,
            'total' => $quantity_count * $product->price, // total
        ]);
        Products::find($product->id)
            ->decrement('stock', $quantity_count);
        return;
    }
}
