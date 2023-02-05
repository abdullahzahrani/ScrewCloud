<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function cancelOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = 'canceled';
        $order->canceled_date = now();
        $order->save();

        session()->flash('order_message', 'Order canceled successfully!');
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        // dd($order->transaction->mode);
        return view('livewire.user.user-order-details-component', ['order' => $order]);
    }
}
