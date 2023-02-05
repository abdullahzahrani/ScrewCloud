<!-- component -->
<section class="px-4 antialiased text-gray-600">
    <div class="flex flex-col justify-center h-full py-6">
        <!--- Checkout -->
        <header class="">
            <h1 class="text-3xl font-bold text-center text-green-600">Checkout</h1>
        </header>
        <div class="w-full max-w-3xl mx-auto mt-10 bg-white border border-gray-200 rounded-sm shadow-lg">
            <form wire:submit.prevent="placeOrder">
                <!-- Form Billing Address -->
                <div class="">
                    <div class="flex justify-center px-5 py-4 border-b border-gray-100">
                        <h2 class="font-semibold text-gray-800">Billing Address</h2>
                    </div>
                    <div class="space-y-5">
                        <div class="flex justify-around">
                            <label for="fname">first name<span>*</span></label>
                            <input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
                            {{-- @error('firstname') <span class="my-2">{{ $message }}</span> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label for="lname">last name<span>*</span></label>
                            <input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
                        </div>
                        <div class="flex justify-around">
                            <label for="email">Email Addreess:</label>
                            <input  type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                        </div>
                        <div class="flex justify-around">
                            <label for="phone">Phone number<span>*</span></label>
                            <input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
                        </div>
                        <div class="flex justify-around">
                            <label for="add">Line 1:</label>
                            <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
                        </div>
                        <div class="flex justify-around">
                            <label for="add">Line 2:</label>
                            <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
                        </div>
                        <div class="flex justify-around">
                            <label for="city">Province<span>*</span></label>
                            <input type="text" name="province" value="" placeholder="Province name" wire:model="province">
                        </div>
                        <div class="flex justify-around">
                            <label for="city">Town / City<span>*</span></label>
                            <input type="text" name="city" value="" placeholder="City name" wire:model="city">
                        </div>
                        <div class="flex justify-around" >
                            <label for="zip-code">Postcode / ZIP:</label>
                            <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                        </div>
                    </div>
                </div>
                <!-- End Form Billing Address -->

                <div class="my-3 border border-gray-500"></div>
                <!-- Payment Method -->
                <div class="space-y-5 p-4">
                    <h4 class="text-xl text-center">Payment Method</h4>
                    <div class="">
                        <div class="">
                            <input name="cod" id="cod" value="cod" type="radio" class="" wire:model="paymentmode">
                            <span class="font-semibold">Cash On Delivery</span>
                            <div class="">Order now pay on delivery</div>
                        </div>
                        <div class="">
                            <input name="card" class="hidden" id="card" value="card" type="radio" wire:model="paymentmode">
                            <span class="font-semibold">Debit / Credit Card</span>
                            <div class="">Soon</div>

                            {{-- debit card --}}
                            <div x-data="{open: false}" x-cloak class="max-w-md">
                                <button @click="open = ! open" class="py-2 px-4 rounded bg-gray-700 text-white font-semibold text-md">Open / close card</button>
                                @if (Session::has('stripe_error'))
                                    <div class="text-red-500">{{ Session::get('stripe_error') }}</div>
                                @endif
                                <div x-show="open" class="space-y-2 flex justify-between">
                                    <div class="">
                                        <label for="card-no">Card Number: </label>
                                        <input type="text" name="card-no" value="" placeholder="Card Number" wire:model="card_no">
                                        @error('card_no') <span class="my-2 text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="">
                                        <label for="exp-month">Expiry Month: </label>
                                        <input type="text" name="exp-month" value="" placeholder="MM" wire:model="exp_month">
                                        @error('exp_month') <span class="my-2 text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="">
                                        <label for="exp-year">Expiry Year: </label>
                                        <input type="text" name="exp-year" value="" placeholder="YYYY" wire:model="exp_year">
                                        @error('exp_year') <span class="my-2 text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="">
                                        <label for="cvc">CVC: </label>
                                        <input type="password" name="cvc" value="" placeholder="CVC" wire:model="cvc">
                                        @error('cvc') <span class="my-2 text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- end debit card --}}
                        </div>
                    </div>
                </div>
                <!-- End Payment Method -->

                <!-- list -->
                @if (Session::has('checkout'))
                <div class="">
                    <div class="flex justify-around font-bold"><span>Grand Total</span> <span class="">${{ Session::get('checkout')['total'] }}</span></div>
                </div>
                @endif
                <div class="flex justify-center">
                    <button type="submit" class="px-4 py-2 bg-yellow-500 rounded shadow">Place order now</button>
                </div>
            </form>
        </div>
        <!-- End Checkout -->
    </div>
</section>

