
<!-- component -->
<section class="h-screen px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="flex justify-between px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">All Coupon</h2>
                <a href="{{ route('admin.addcoupon') }}" class="text-green-500 underline">Add New</a>
            </header>
            <div class="p-3">
                @if (session()->has('message'))
                <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                    {{ session('message') }}
                </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full mb-4 table-auto">
                        <thead class="text-xs font-semibold text-gray-400 uppercase bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Coupon Code</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Coupon Type</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Coupon Value</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Cart Value</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{ $coupon->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $coupon->code }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $coupon->type }}</div>
                                </td>
                                @if($coupon->type == 'fixed')

                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $coupon->value }}</div>
                                </td>
                                @else
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $coupon->value }} %</div>
                                </td>
                                @endif
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $coupon->cart_value }}</div>
                                </td>
                                <td class="flex items-center p-2 justify-evenly whitespace-nowrap">
                                    <a href="{{ route('admin.editcoupon', ['coupon_id' => $coupon->id]) }}" class="px-4 py-2 text-left text-white bg-blue-400 rounded">Edit</a>
                                    <a wire:click.prevent="deleteCoupon({{ $coupon->id }})" onclick="confirm('Are you sure want to delete this coupon?') || event.stopImmediatePropagation()" href="#" class="px-4 py-2 text-left text-white bg-red-400 rounded">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $coupons->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</section>

