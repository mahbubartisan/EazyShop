<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function ShowOrders()
    {

        $data['orders'] = Order::latest()->get();

        return view('admin.order.show', $data);
    }

    public function OrderDetail($id)
    {
        $data['order'] = Order::with('district', 'city', 'user')->where('id', $id)->first();
        $data['order_items'] = OrderItem::with('product')->where('order_id', $id)->get();

        return view('admin.order.view', $data);
    }

    public function OrderStatusUpdate(Request $request, $id)
    {
        if ($request->status == 'Delivered') {
            $orderItems = OrderItem::where('order_id', $id)->get();
            foreach ($orderItems as $orderItem) {

                Product::where('id', $orderItem->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-' . $orderItem->quantity)]);
            }
        }


        $order = Order::findOrFail($id)->update([
            'status' => $request->status,
            'updated_at' => now()
        ]);

        return json_encode($order);
    }

// public function DeliveredOrder($id)
// {
//     Order::findOrFail($id)->update(['status' => 'Delivered']);

//     return back();
// }
}