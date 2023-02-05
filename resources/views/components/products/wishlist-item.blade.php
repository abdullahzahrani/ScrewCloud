@props(['item'])

<div class="p-2 mb-5">
    <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}" >
        <img class="mb-2" src="{{ "https://hcth.oss-me-central-1.aliyuncs.com/" }}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
            <div class="">{{ $item->model->name }}</div>
    </a>
    <div class="text-sm">
        <div class="text-gray-700 ">John Doe</div>
        <div class="my-1">⭐⭐⭐⭐</div>
        <div class="my-2 text-yellow-700"> <span class="align-top">$</span><span class="text-lg font-semibold">{{ $item->model->regular_price }}</span><span class="align-top">99</span></div>
        <div class="mb-2">Arrives: <span class="font-semibold">Sunday, January 01</span> </div>
        <div class="mb-2">Category: <span class="font-semibold">{{ $item->model->category->name }}</span> </div>
        <div class="flex justify-between">
        <a href="#" class="px-2 py-1 text-sm bg-gray-200 border border-black "
            wire:click.prevent="moveProductFromWishlistToCart('{{ $item->rowId }}')">Move to Cart</a>
            <div class="">
                <x-heroicon-s-heart class="w-6 h-6 text-red-500 cursor-pointer" wire:click.prevent="removeFromWishlist({{ $item->model->id }})" />
            </div>
        </div>
    </div>
</div>
