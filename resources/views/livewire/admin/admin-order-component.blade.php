<!-- component -->
<section class="px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white border border-gray-200 rounded-sm shadow-lg max-w-7xl">
            <header class="flex justify-around px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Orders</h2>
            </header>
            <div class="p-3">
                @if (session()->has('message'))
                <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                    {{ session('message') }}
                </div>
                @endif

                <div class="overflow-x-auto">
                    @if (session()->has('order_message'))
                    <div class="px-4 py-2 my-3 text-green-700 bg-green-300" role="alert"">
                        {{ session('order_message') }}
                    </div>
                    @endif

                    <table class="w-full mb-4 table-auto">
                        <thead class="text-xs font-semibold text-gray-400 uppercase bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Id</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Subtotal</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Discount</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Tax</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Total</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Firstname</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Lastname</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Mobile</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Zipcode</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Status</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Created At</div>
                                </th>
                                <th colspan="2" class="p-2 text-center whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($orders as $order)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{ $order->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $order->subtotal }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->discount }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->tax }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->total }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->firstname }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->lastname }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->mobile }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->email }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->zipcode }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->status }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $order->created_at }}</div>
                                </td>
                                <td class="flex items-center p-2 justify-evenly whitespace-nowrap">
                                    <a href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}" class="px-4 py-2 text-left text-white bg-blue-400 rounded mr-2">Details</a>
                                </td>
                                <td>
                                    <div x-cloak x-data="{ open: false }" class="inline-block">
                                        <!-- Dropdown Toggle Button -->
                                        <button @click="open = !open" class="flex items-center px-3 py-2 bg-green-400 rounded-lg">
                                            <span class="mr-4"> Status</span>
                                            <span
                                                :class="open = ! open ? '' : '-rotate-180'"
                                                class="transition-transform duration-500 transform">
                                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </button>
                                        <!-- End Dropdown Toggle Button -->

                                        <!-- Dropdown Menu -->
                                        <div x-show="open"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90"
                                            class="flex flex-col py-1 text-gray-500 bg-white rounded-lg shadow-xl w-40">
                                            <a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'delivered')" class="block px-4 py-1 hover:text-blue-400">Delivered</a>
                                            <a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }}, 'canceled')" class="block px-4 py-1 hover:text-blue-400">Canceled</a>
                                        </div>
                                        <!-- End Dropdown Menu -->
                                    </div>
                                    <!-- End Dropdown 1 -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

