<div class="">
    <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
        <div>
            <img src="https://avatars.githubusercontent.com/u/54291811?v=4" alt="user-avatar" class="w-12 rounded-full" />
        </div>
        <div class="flex flex-col justify-start items-start space-y-2">
            <p class="text-base font-medium">{{ $orderItem->order->user->name }}</p>
            <p class="text-sm">{{ Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y')  }}</p>
        </div>
    </div>

    <div class="w-full flex py-2 space-x-4">
        <div class="text-xl md:text-2xl font-medium leading-normal mr-4">{{ $orderItem->review->comment }}</div>
        <div class="flex items-center">
            @for($i = 1; $i <= 5; $i++)
                @if ($i <= $orderItem->review->rating)
                <span class="">⭐</span>
                @else
                <div class="text-base">
                    <x-bi-star class=""/>
                </div>
                @endif
            @endfor
        </div>
    </div>
</div>
