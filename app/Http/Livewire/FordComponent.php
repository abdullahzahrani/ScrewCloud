<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class FordComponent extends Component
{
    public $sorting;

    public $pagesize;

    public $minPrice;

    public $maxPrice;

    use WithPagination;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = 12;

        $this->minPrice = 1;
        $this->maxPrice = 1000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');

        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');

                return;
            }
        }
    }

    public function render()
    {
        if ($this->sorting == 'date') {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->where('brand','=','ford')->orderBy('created_At', 'DESC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price') {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->where('brand','=','ford')->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price-desc') {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->where('brand','=','ford')->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::whereBetween('regular_price', [$this->minPrice, $this->maxPrice])->where('brand','=','ford')->paginate($this->pagesize);
        }
        $categories = Category::all();
        // dd($categories);
        // $page_title = 'International Shopping';

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories]);
    }
}
