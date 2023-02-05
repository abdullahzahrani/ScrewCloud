@props(['popular_product'])

<section class="p-2 mx-2 bg-white">
    <div class="p-2 mx-2 bg-white">
        <h2 class="mx-2 mt-4 mb-2 text-lg antialiased font-bold tracking-wide">
            Screw Cloud Popular Products
            <a href="{{ route('shop') }}" class="inline-block text-sm font-normal text-blue-500 bg-grey-lighter">Shop now</a>
        </h2>

        <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true }'>
            @foreach ($popular_product as $popularProduct)
            <a href="{{ route('product.details', ['slug' => $popularProduct->slug]) }}" class="p-4">
                <img class="h-48" src="{{ asset('assets/images/products') }}/{{ $popularProduct->image }}" alt="Popular product">
            </a>
            @endforeach
        </div>
    </div>

</section>
