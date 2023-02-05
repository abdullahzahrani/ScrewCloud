<li>
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
            <div class="space-x-3 text-sm">
                <span class="">Qty: </span>
                <input class="w-10" type="text" name="product-quantity" value="{{ $item->qty }}" data-max="20" pattern="[0-9]*" >
                <button class="px-3 py-2 bg-green-400 rounded-full" wire:click.prevent="increaseQty('{{ $item->rowId }}')">+</butt>
                <button class="px-4 py-2 bg-yellow-400 rounded-full" wire:click.prevent="decreaseQty('{{ $item->rowId }}')">-</butt>
                <button class="px-3 py-2 bg-red-400 rounded-full" wire:click.prevent="destroy('{{ $item->rowId }}')">x</butt>
                <button class="px-3 py-2 text-white bg-gray-700 rounded" wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">Save For Later</butt>
            </div>
            <div class="">
            </div>
        </div>
    </div>
</li>
