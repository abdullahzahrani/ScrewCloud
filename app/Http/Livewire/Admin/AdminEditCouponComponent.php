<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;

    public $type;

    public $value;

    public $cart_value;

    public $coupon_id;

    public function mount($coupon_id)
    {
        $couppon = Coupon::find($coupon_id);
        $this->code = $couppon->code;
        $this->type = $couppon->type;
        $this->value = $couppon->value;
        $this->cart_value = $couppon->cart_value;
        $this->coupon_id = $coupon_id;
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component');
    }

    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
        ]);
        // edit coupon
        Coupon::find($this->coupon_id)->update([
            'code' => $this->code,
            'type' => $this->type,
            'value' => $this->value,
            'cart_value' => $this->cart_value,
        ]);
        // redirect
        return redirect('/admin/coupons')->with('message', 'Coupon successfully edited.');
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
