
{{-- @dump($orderItem) --}}
<div class="inline-flex w-full space-x-3 p-11">
    <div class="w-2/6">
        <img src="{{ "https://hcth.oss-me-central-1.aliyuncs.com/" }}/{{ $orderItem->product->image }}" alt="" class="w-full h-80">
    </div>

    <div class="w-3/6 px-2 text-sm">
        <div class="text-2xl font-bold"> {{ $orderItem->product->name }} </div>
        <div class="leading-9 text-green -600">Visit the store</div>
        <div class="my-1">⭐⭐⭐⭐</div>
        <hr class="bg-gray-300 h-0.5 my-2">
        <div class="my-2">
            <span class="align-top">Price: </span>
            <span class="text-lg font-semibold text-yellow-600"> {{ $orderItem->price }}300 </span>
        </div>
    </div>

    <div class="">
        @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
        @endif
        <form method="post" wire:submit.prevent="addReview">
            {{-- Rating --}}
            <div class="">
                <label for="rated-1">⭐</label>
                <input type="radio" name="rating" id="rated-1" value="1" wire:model="rating">
                <label for="rated-2">⭐</label>
                <input type="radio" name="rating" id="rated-2" value="2" wire:model="rating">
                <label for="rated-3">⭐</label>
                <input type="radio" name="rating" id="rated-3" value="3" wire:model="rating">
                <label for="rated-4">⭐</label>
                <input type="radio" name="rating" id="rated-4" value="4" wire:model="rating">
                <label for="rated-5">⭐</label>
                <input type="radio" name="rating" id="rated-5" value="5" checked="checked" wire:model="rating">
                @error('rating') <span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
            </div>
            {{-- Comment --}}
            <div class="">
                <label for="comment">*</label>
                <textarea name="comment" id="comment" cols="30" rows="10" wire:model="comment"></textarea>
                @error('comment') <span class="text-red-500 text-xs italic">{{ $message }}</span>@enderror
            </div>
            {{-- Submit --}}
            <div class="">
                <button type="submit" class="btn btn-green">Submit</button>
        </form>
    </div>



</div>
