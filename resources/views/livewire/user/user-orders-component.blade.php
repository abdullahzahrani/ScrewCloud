<!-- component -->
<section class="px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white border border-gray-200 rounded-sm shadow-lg max-w-7xl">
            <header class="flex justify-around px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Orders</h2>
                <a href="{{ route('admin.addproduct') }}" class="text-green-500 underline">Add New</a>
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
                                <th class="p-2 whitespace-nowrap">
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
                                    <a href="{{ route('user.orderdetails', ['order_id' => $order->id]) }}" class="px-4 py-2 text-left text-white bg-blue-400 rounded mr-2">Details</a>
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

