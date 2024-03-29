<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;

    public $slug;

    public $short_description;

    public $description;

    public $regular_price;

    public $sale_price;

    public $SKU;

    public $stock_status;

    public $featured;

    public $quantity;

    public $image;

    public $brand;

    public $category_id;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    // public function updated($fields)
    // {
    //     $this->validateOnly($fields, [
    //         'name' => 'required',
    //         'slug' => 'required|unique:products',
    //         'short_description' => 'required',
    //         'description' => 'required',
    //         'regular_price' => 'required|numeric',
    //         'sale_price' => 'numeric',
    //         'SKU' => 'required',
    //         'stock_status' => 'required',
    //         'quantity' => 'required|numeric',
    //         'image' => 'required|mimes:jpeg,jpg,png,gif',
    //         'category_id' => 'required',
    //     ]);
    // }

    public function addProduct()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'slug' => 'required|unique:products',
        //     'short_description' => 'required',
        //     'description' => 'required',
        //     'regular_price' => 'required|numeric',
        //     'sale_price' => 'numeric',
        //     'SKU' => 'required',
        //     'stock_status' => 'required',
        //     'quantity' => 'required|numeric',
        //     'image' => 'required|mimes:jpeg,jpg,png,gif',
        //     'category_id' => 'required',
        // ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp;
        $this->image->storeAs('products', $imageName);
        $product->image = $this->image->getRealPath();
        $product->brand = $this->brand;
        $product->category_id = 1;
        $product->user_id = 1;
        $product->save();


        return redirect('/admin/products')->with('message', 'Product successfully added.');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.admin-add-product-component', ['categories' => $categories]);
    }
}
