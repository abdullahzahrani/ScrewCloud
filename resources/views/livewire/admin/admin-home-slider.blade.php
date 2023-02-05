<!-- component -->
<section class="px-4 antialiased text-gray-600 bg-gray-100">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full mx-auto bg-white border border-gray-200 rounded-sm shadow-lg max-w-7xl">
            <header class="flex justify-around px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">All Slider</h2>
                <a href="{{ route('admin.addhomeslider') }}" class="text-green-500 underline">Add New</a>
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
                                    <div class="font-semibold text-left">Image</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Title</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Subtitle</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Price</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Link</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Status</div>
                                </th>
                                 <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Date</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Action</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($sliders as $slider)
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-800">{{ $slider->id }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">
                                        <img class="" src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" alt="{{ $slider->name }}" width="60">
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $slider->title }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $slider->subtitle }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $slider->price }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $slider->link }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $slider->created_at }}</div>
                                </td>
                                <td class="flex items-center p-2 justify-evenly whitespace-nowrap">
                                    <a href="{{ route('admin.edithomeslider', ['slider_id' => $slider->id]) }}" class="px-4 py-2 text-left text-white bg-blue-400 rounded">Edit</a>
                                    <button wire:click.prevent="deleteSlide({{ $slider->id }})" class="px-4 py-2 text-left text-white bg-red-400 rounded">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $sliders->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</section>

