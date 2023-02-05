
<!-- component -->
<section class="px-4 mt-5 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Add New Products -->
        <div class="w-full max-w-3xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="flex justify-between px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Add New Product</h2>
                <a href="{{ route('admin.products') }}" class="text-green-500 underline">All Products</a>
            </header>

            <div class="p-5">
                <form wire:submit.prevent="addProduct" enctype="multipart/form-data">
                    @if (session()->has('message'))
                    <div class="px-4 py-2 my-3 text-green-700 bg-green-300">
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="space-y-5">
                        <div class="flex justify-around">
                            <label>Product Name</label>
                            <input type="text" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug">
                            {{-- @error("name") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Product Slug</label>
                            <input type="text" placeholder="Product Slug" wire:model="slug">
                           {{-- @error("slug") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Short Description</label>
                            <textarea name="" id="" cols="20" rows="5" placeholder="Short Description" wire:model="short_description"></textarea>
                            {{-- @error("short_description") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Description</label>
                            <textarea name="" id="" cols="20" rows="5" placeholder="description" wire:model="description"></textarea>
                        {{-- @error("description") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Regular Price</label>
                            <input type="text" placeholder="regular price" wire:model="regular_price">
                        {{-- @error("regular_price") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>SKU</label>
                            <input type="text" placeholder="sku" wire:model="SKU">
                        {{-- @error("SKU") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Stock</label>
                            <select wire:model="stock_status">
                                <option value="instock">Instock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        {{-- @error("stock_status") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Featured</label>
                            <select wire:model="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="flex justify-around">
                            <label>Quantity</label>
                            <input type="text" placeholder=" quantity" wire:model="quantity">
                            {{-- @error("quantity") <p class="text-red-500">{{ $message }}</p> @enderror --}}
                        </div>
                        <div class="flex justify-around">
                            <label>Product Image</label>
                            <input type="file" placeholder="Product Slug" wire:model="image">
                            {{-- @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="preveiw image" width="120">
                            @endif --}}
                            @error('image.*') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-around">
                            <label>Category</label>
                            <select wire:model="brand">
                                <option>Please chose brand</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Ford">Ford</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Hyundai">Hyundai</option>
                            </select>
                             @error("category_id") <p class="text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="flex justify-center mt-10">
                        <button type="submit" class="px-4 py-2 text-white bg-gray-700 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Add New Products -->
    </div>
</section>

@push('scripts')
    <script>
        function simpleEditor(){
            tinymce.init({
                selector:'textarea#description',
                width: 400,
                height: 300,
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description', sd_data);
                    });
                }
            });
        };

        simpleEditor();
    </script>
@endpush
