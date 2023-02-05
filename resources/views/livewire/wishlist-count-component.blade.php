<a href="{{ route('product.wishlist') }}" class="flex flex-col px-2 mx-3 text-white border rounded">
    <span class="" style="font-size: 12px" >Wishlist
        @if (Cart::instance('wishlist')->count() > 0)
            <span class="mx-1">({{ Cart::instance('wishlist')->count() }})</span>
        @endif
    </span>
    <x-heroicon-s-heart class="w-6 h-6 text-red-500 cursor-pointer" />
</a>
