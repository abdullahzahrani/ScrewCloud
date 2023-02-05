<!-- component -->
<section class="px-4 mt-5 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Add New Sliders -->
        <div class="w-full max-w-3xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="flex justify-between px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Add New Slider</h2>
                <a href="{{ route('admin.homeslider') }}" class="text-green-500 underline">All Slides</a>
            </header>

            <div class="p-5">
                <form wire:submit.prevent="addSlide">
                    @if (session()->has('message'))
                    <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="space-y-5">
                        <div class="flex justify-around">
                            <label>Title</label>
                            <input type="text" placeholder="title" wire:model="title">
                        </div>
                        <div class="flex justify-around">
                            <label>Subtitle</label>
                            <input type="text" placeholder="Subtitle" wire:model="subtitle">
                        </div>
                        <div class="flex justify-around">
                            <label>Price</label>
                            <input type="text" placeholder="price" wire:model="price">
                        </div>
                        <div class="flex justify-around">
                            <label>Link</label>
                            <input type="text" placeholder="Link" wire:model="link">
                        </div>
                        <div class="flex justify-around">
                            <label>Image</label>
                            <input type="file" placeholder="image" wire:model="image">
                        </div>
                        <div class="flex justify-around">
                            <label>Status</label>
                            <select wire:model="status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>

                    <div class="flex justify-center mt-10">
                        <button type="submit" class="px-4 py-2 text-white bg-gray-700 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Add New Sliders -->
    </div>
</section>
