<section class="bg-white flex">
    <nav class="flex flex-col w-64 bg-gray-200 p-3 text-sm">
        <div class="text-black font-bold text-sm" href="#"></div>
            <div class="p-2">
                <span class="font-bold">Computers</span>
                <ul class="p-2">
                    @foreach ($categories as $category)
                    <li class="">
                        <a href="{{ route('product.category', ['category_slug'=>$category->slug]) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                    {{-- <li><a href="#">Computer Accessories & Peripherals</a></li>
                    <li><a href="#">Computer Components</a></li>
                    <li><a href="#">Computer & Tablets</a></li>
                    <li><a href="#">Data Storage</a></li>
                    <li><a href="#">Laptop Accessories</a></li>
                    <li><a href="#">Monitors</a></li>
                    <li><a href="#">Networking Products</a></li>
                    <li><a href="#">Power Strips & Surge</a></li>
                    <li><a href="#">Protectors</a></li>
                    <li><a href="#">Printers</a></li>
                    <li><a href="#">Scanners</a></li>
                    <li><a href="#">Servers</a></li>
                    <li><a href="#">Tablet Accessories</a></li>
                    <li><a href="#">Tablet Replacement Parts</a></li>
                    <li><a href="#">Warranties & Services</a></li> --}}

                </ul>
            </div>

    </nav>

    <article class="bg-gray-100 w-screen p-4">
        <div class="text-3xl font-bold">Car spare parts</div>
        <span class="text-sm">

        </span>
        <span class="">
            <select name="filter" class="cursor-pointer" wire:model="sorting">
                <option value="default" selected="selected">Default</option>
                <option class="cursor-pointer" value="date">newness</option>
                <option class="cursor-pointer" value="price">low to high</option>
                <option class="cursor-pointer" value="price-desc">high to low</option>
            </select>
        </span>

        <span class="">
            <select name="post-per-page" class="cursor-pointer" wire:model="pagesize">
                <option value="12" selected="selected">12 items</option>
                <option class="cursor-pointer" value="18">18 items</option>
                <option class="cursor-pointer" value="24">24 items</option>
                <option class="cursor-pointer" value="32">32 items</option>
            </select>
        </span>

        {{-- products card --}}
        <div class="h-64 grid grid-cols-3 gap-4 my-6">
            @foreach ($products as $product)
            <div class="p-2 mb-5">
                <a href="{{ route('product.details', ['slug'=>$product->slug]) }}" >
                    <img class="mb-2" src="{{ "https://hcth.oss-me-central-1.aliyuncs.com/" }}/{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="">{{ $product->name }}</div>
                </a>
                <div class="text-sm">
                    <div class=" text-gray-700">John Doe</div>
                    <div class="my-1">⭐⭐⭐⭐</div>
                    <div class="my-2 text-yellow-700"> <span class="align-top">$</span><span class="text-lg font-semibold">{{ $product->regular_price }}</span><span class="align-top">99</span></div>
                    <div class="mb-2">Arrives: <span class="font-semibold">Sunday, January 01</span> </div>
                    <a href="#" class=" text-sm absolute py-1 px-2 border border-black bg-gray-200"
                       wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Add to Cart</a>
                </div>
            </div>
            @endforeach
            {{ $products->links() }}
        </div>

    </article>
</section>
