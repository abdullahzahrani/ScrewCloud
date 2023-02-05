
<!-- component -->
<section class="h-screen px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white border border-gray-200 rounded-sm shadow-lg">
            <header class="flex justify-between px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Category</h2>
                <a href="{{ route('admin.addcategory') }}" class="text-green-500 underline">Add New</a>
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
                                    <div class="font-semibold text-left">Category Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Slug</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($categories as $category)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{ $category->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $category->name }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $category->slug }}</div>
                                </td>
                                <td class="flex items-center p-2 justify-evenly whitespace-nowrap">
                                    <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}" class="px-4 py-2 text-left text-white bg-blue-400 rounded">Edit</a>
                                    <a wire:click.prevent="deleteCategory({{ $category->id }})" onclick="confirm('Are you sure want to delete this category?') || event.stopImmediatePropagation()" href="#" class="px-4 py-2 text-left text-white bg-red-400 rounded">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

