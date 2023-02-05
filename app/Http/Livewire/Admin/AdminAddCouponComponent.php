<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;

    public $type;

    public $value;

    public $cart_value;

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component');
    }

    public function addCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
        ]);
        // add coupon
        Coupon::create([
            'code' => $this->code,
            'type' => $this->type,
            'value' => $this->value,
            'cart_value' => $this->cart_value,
        ]);

        // redirect
        return redirect('/admin/coupons')->with('message', 'Coupon successfully added.');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
        ]);
    }
}
