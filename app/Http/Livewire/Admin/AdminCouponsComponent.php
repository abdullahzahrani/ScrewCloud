<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function render()
    {
        $coupons = Coupon::all();

        return view('livewire.admin.admin-coupons-component', ['coupons' => $coupons]);
    }

    public function deleteCoupon(Coupon $coupon_id)
    {
        $coupon_id->delete();

        return redirect('/admin/coupons')->with('message', 'Coupon successfully deleted.');
    }
}
