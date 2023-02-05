<section class="p-3 bg-white">
    <nav class="text-sm bg-gray-200">
        <a class="text-sm font-bold text-black" href="/">Home</a>
        <div class="p-2">
            <span class="font-bold">Wishlist</span>
        </div>

        {{-- Wishlist Product card --}}
        <div class="grid h-64 grid-cols-3 gap-4 my-6">
            @forelse (Cart::instance('wishlist')->content() as $item)
                <x-products.wishlist-item :item="$item" />
            @empty
                <div class="text-right">
                    <div class="text-gray-700">No items in wishlist</div>
                </div>
            @endforelse
        </div>
    </nav>
</section>
