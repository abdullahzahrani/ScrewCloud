<div class="">
    @if (Cart::instance('cart')->count() > 0)

        @if (Session::has('success_message'))
            <div class="bg-green-400">
                <strong>Success</strong>
                {{ Session::get('success_message') }}
            </div>
        @endif

        <ul class="divide-y divide-slate-100">
            {{ $slot }}
        </ul>

        @if(Cart::instance('cart')->content()->count() > 1)
            <button class="px-4 py-2 font-bold bg-red-600 rounded text-md" wire:click.prevent="destroyAll()">Delete All</button>
        @endif

    @else
        <div class="p-2 text-center">
            <h1>Your cart is empty</h1>
            <p class="">Add items to it now</p>
            <a href="/shop" class="">Shop now</a>
        </div>
    @endif
</div>
