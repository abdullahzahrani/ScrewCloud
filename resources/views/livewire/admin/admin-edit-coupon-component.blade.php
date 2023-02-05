<!-- component -->
<section class="px-4 mt-5 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Add New Products -->
        <div class="w-full max-w-3xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="flex justify-between px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Edit Coupon</h2>
                <a href="{{ route('admin.coupons') }}" class="text-green-500 underline">All Coupon</a>
            </header>

            <div class="p-5">
                <form wire:submit.prevent="updateCoupon">
                    @if (session()->has('message'))
                    <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="space-y-5">
                        <div class="flex justify-around">
                            <label>Coupon Code</label>
                            <input type="text" placeholder="Coupon Code" wire:model="code" >
                            {{-- @error("code")
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="flex justify-around" wire:model="type">
                            <label>Coupon Type</label>
                            <select>
                                <option value="">Select</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            {{-- @error("type")
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Coupon Value</label>
                            <input type="text" placeholder="Coupon Value" wire:model="value" >
                            {{-- @error("value")
                            <p class="text-red-500">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        <div class="flex justify-around">
                            <label>Cart Value</label>
                            <input type="text" placeholder="Cart Value" wire:model="cart_value">
                            {{-- @error("cart_value")
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror --}}
                        </div>

                    </div>
                    <div class="flex justify-center mt-10">
                        <button type="submit" class="px-4 py-2 text-white bg-gray-700 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Add New Products -->
    </div>
</section>
