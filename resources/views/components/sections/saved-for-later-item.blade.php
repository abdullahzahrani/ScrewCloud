<li>
    <hr class="border-gray-300">
    <div class="flex checkoutProduct" style=" margin-bottom: 20px" >
        <img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->name }}" class="object-contain checkoutproduct__image" style="width: 180px; height: 180px;" />

        <div class="mt-8 checkoutproduct__info " style="padding-left: 20px;" >
            <a href="{{ route('product.details', ['slug' => $item->model->slug ]) }}" class="checkoutproduct__title" style="" >{{ $item->model->name }}</a>
            <p class="checkoutproduct__price">
                <small> $</small>
                <strong>{{ $item->model->regular_price}}</strong>
            </p>
            <div class="flex checkoutproduct__rating">
                <p class="text-green-500">In Stock</p>
            </div>
            <div class="mt-4">
                <button class="px-3 py-2 text-sm bg-blue-400 rounded" wire:click.prevent="moveToCart('{{ $item->rowId }}')">Move To Cart</button>
                <button class="px-3 py-2 bg-red-400 rounded-full" wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')">x</button>
            </div>
        </div>
    </div>
</li>
