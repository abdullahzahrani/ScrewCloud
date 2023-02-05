<a href="{{ route('product.cart') }}"  class="flex items-center" style="color: white">
    <x-heroicon-o-shopping-cart class="w-8 h-8" />
    <div class="" style="font-size: 14px; font-weight: 800; margin-left: 10px; margin-right: 10px">
        @if ( Cart::instance('cart')->count() > 0 )
        <span> {{ Cart::instance('cart')->count() }} </span>
        @endif
        <span>Cart</span>
    </div>
</a>
