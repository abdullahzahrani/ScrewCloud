<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if ($status == 'delivered') {
            $order->delivered_date = now();
        } elseif ($status == 'canceled') {
            $order->canceled_date = now();
        }
        $order->save();

        return redirect('/admin/orders')->with('order_message', 'Order status updated successfully!');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(12);

        return view('livewire.admin.admin-order-component', [
            'orders' => $orders,
        ]);
    }
}
