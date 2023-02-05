 {{-- @dump(Cart::instance('saveForLater')->count()) --}}
<div class="">
    @if (Session::has('saved_success_message'))
        <div class="bg-green-400">
            <strong>Success</strong>
            {{ Session::get('saved_success_message') }}
        </div>
    @endif

    @if (Cart::instance('saveForLater')->count() >= 0)
        <ul>
            {{ $slot }}
        </ul>
    @else
        <div class="">No Item Saved For Later</div>
    @endif
</div>
