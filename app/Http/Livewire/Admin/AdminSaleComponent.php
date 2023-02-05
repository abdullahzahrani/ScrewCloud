<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;

    public $status;

    public function mount()
    {
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }

    public function updateSale()
    {
        // echo 'hello';
        $sale = Sale::find(2);
        $sale->sale_Date = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        session()->flash('message', 'Sale Date successfully updated.');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component');
    }
}
