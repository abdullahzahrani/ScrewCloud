<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/admin/products')->with('message', 'Product successfully deleted.');
    }

    public function render()
    {
        $products = Product::where('user_id','=',Auth::id())->paginate(10);

        return view('livewire.admin.admin-product-component', ['products' => $products]);
    }
}
