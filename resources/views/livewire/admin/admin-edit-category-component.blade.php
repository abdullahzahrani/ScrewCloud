{{--<!-- component -->--}}
{{--<section class="h-screen px-4 antialiased text-gray-600 bg-gray-100">--}}
{{--    <div class="flex flex-col justify-center h-full">--}}
{{--        <!-- Edit Category -->--}}
{{--        <div class="w-full max-w-2xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">--}}
{{--            <header class="flex justify-between px-5 py-4 border-b border-gray-100">--}}
{{--                <h2 class="font-semibold text-gray-800">Edit Category</h2>--}}
{{--                <a href="{{ route('admin.categories') }}" class="text-green-500 underline">All Categories</a>--}}
{{--            </header>--}}

{{--            <div class="p-5">--}}
{{--                <form wire:submit.prevent="updateCategory">--}}
{{--                    @if (session()->has('message'))--}}
{{--                    <div class="px-4 py-2 my-3 text-green-700 bg-green-300">--}}
{{--                        {{ session('message') }}--}}
{{--                    </div>--}}
{{--                    @endif--}}

{{--                    <div class="space-y-5">--}}
{{--                        <div class="flex justify-around">--}}
{{--                            <label>Category Name</label>--}}
{{--                            <input type="text" placeholder="Category Name" wire:model="name" wire:keyup='generateslug'>--}}
{{--                            --}}{{-- @error("name")--}}
{{--                                <p class="text-red-500">{{ $message }}</p>--}}
{{--                            @enderror --}}
{{--                        </div>--}}
{{--                        <div class="flex justify-around">--}}
{{--                            <label>Category Slug</label>--}}
{{--                            <input type="text" placeholder="Category Slug" wire:model="slug">--}}
{{--                            --}}{{-- @error("slug")--}}
{{--                                <p class="text-red-500">{{ $message }}</p>--}}
{{--                            @enderror --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="flex justify-center mt-10">--}}
{{--                        <button class="px-4 py-2 text-white bg-gray-700 rounded">Update</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End Add New Category -->--}}
{{--    </div>--}}
{{--</section>--}}
