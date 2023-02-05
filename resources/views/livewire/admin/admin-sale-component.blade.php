<section class="h-screen px-4 w-full antialiased">
    <div class="flex flex-col justify-center h-full">
        <div class="w-full max-w-2xl mx-auto p-4 border border-gray-500 rounded-lg shadow-lg">

        <div class="text-2xl text-gray-900">
            Sale Setting
        </div>

        {{-- Form sale --}}
        <div class="">
            <form wire.submit.prevent="updateSale">
                @if (session()->has('message'))
                <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                    {{ session('message') }}
                </div>
                @endif

                <div class="flex justify-around">
                    <label>Status</label>
                    <select wire:model="status">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>

                <div class="flex justify-around mt-10">
                    <label>Status</label>
                    <input type="text" placeholder="YYYY/MM/DD H:M:S" wire:model='sale_date'>
                </div>

                <div class="flex justify-center mt-10">
                    <button type="submit" class="px-4 py-2 text-white bg-gray-700 rounded">Update</button>
                </div>
            </form>
        </div>
        {{-- End form sale --}}
        </div>
    </div>
</section>

@push('scripts')
<script>
    flatpickr("#sale-date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i:s",
    })
</script>
@endpush
