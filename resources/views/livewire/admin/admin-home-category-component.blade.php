{{-- @dump($categories) --}}
<!-- component -->
<div class="px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-5xl p-6 mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="flex justify-center px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Manage Home Categories</h2>
            </header>

            <div class="">
                <form wire:submit.prevent="updateHomeCategory" class="p-3 space-y-5">
                    @if (session()->has('message'))
                    <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="flex justify-evenly">
                    <label>Choose Categories: </label>
                        <div wire:ignore >
                        <select wire:model="selected_categories" class="sel_categories form_control" name="categories[]" >
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            {{-- <option value="Computer">Computer</option>
                            <option value="Top Laptop">Top Laptop</option>
                            <option value="rubik 4x4">rubik 4x4</option> --}}
                        </select>
                        </div>
                    </div>

                    <div class="flex justify-evenly">
                        <label>No Of Products: </label>
                        <input wire:model="numberofproducts" type="text" >
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="px-4 py-2 text-white bg-gray-700 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('.multiple_categories').select2();
    $('.multiple_categories').on('change', function () {
        var data = $('.multiple_categories').select2("val");
        @this.set('selected_categories', data);
    });
});
</script>
@endpush




