<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title ?? 'Screw Cloud.com Spend less. Smile more.' }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
     {{-- <link href="/resources/css/output.css" rel="stylesheet"> --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- flickty -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <!-- Alpine Plugins -->
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script> --}}
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- for price filter range --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<style>

body { font-family: sans-serif; }

.carousel-cell {
  width: 66%;
  height: 200px;
  margin-right: 10px;
  border-radius: 5px;
}

[x-cloak] { display: none !important; }
</style>
<body class="p-0 m-0">
{{-- Navbar --}}
<div class="sticky top-0 flex items-center" style=" height:60px; z-index: 100; background-color: #131921;">
    <a href="/" class="text-3xl font-semibold mx-3">
        <h1 style="color: #cd9042">Screw Cloud</h1>
    </a>

    @livewire('header-search-component')

    <div class="flex justify-evenly">
        @auth
            @if (auth()->user()->utype === 'ADM')
                <!-- Dropdown 1 -->
                <div x-cloak x-data="{ open: false }" @mouseleave="open = false" class="relative inline-block">
                    <button @mouseover="open = true" class="flex items-center px-3 py-2 mx-2 bg-white rounded-lg">
                        <span class="mr-4">See All Actions</span>
                        <span
                            :class="open = ! open ? '' : '-rotate-180'"
                            class="transition-transform duration-500 transform">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </span>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="absolute right-0 py-1 text-gray-500 bg-white rounded-lg shadow-xl w-96">
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-1 hover:text-blue-400">Dashboard</a>
                        <a href="{{ route('admin.categories') }}" class="block px-4 py-1 hover:text-blue-400">Categories</a>
                        <a href="{{ route('admin.products') }}" class="block px-4 py-1 hover:text-blue-400">All Products</a>
                        <a href="{{ route('admin.homeslider') }}" class="block px-4 py-1 hover:text-blue-400">Manage Home Slider</a>
                        <a href="{{ route('admin.homecategories') }}" class="block px-4 py-1 hover:text-blue-400">Manage Home Categories</a>
                        <a href="{{ route('admin.sale') }}" class="block px-4 py-1 hover:text-blue-400">Sale Setting</a>
                        <a href="{{ route('admin.coupons') }}" class="block px-4 py-1 hover:text-blue-400">All Coupon</a>
                        <a href="{{ route('admin.orders') }}" class="block px-4 py-1 hover:text-blue-400">Orders</a>
                        <a  href="{{ route('logout') }}" class="block px-4 py-1 hover:text-blue-400"  class="block w-full px-4 py-2 text-sm text-left hover:bg-gray-100 focus:outline-none focus:ring focus:ring-aqua-400 disabled:text-gray-500"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST">
                            @csrf
                        </form>
                    </div>
                    <!-- End Dropdown Menu -->
                </div>
                <!-- End Dropdown 1 -->
            @else
                <div class="flex flex-col mx-3 text-white">
                    <span class="" style="font-size: 12px" >Hello, {{ auth()->user()->name }}</span>
                    <a href="{{ route('user.dashboard') }}" style="font-size: 12px" >Dashboard</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit(); "
                        class=""
                        style="font-size: 14px; font-weight: 800;" >Logout</a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                    </form>
                </div>
            @endif
        @endauth

        @guest
            <div class="mx-3 text-white">
                <span  class="mx-3 cursor-pointer" style="font-size: 14px; font-weight: 800;" > <a href="{{ route('login') }}">Sign In</a> </span>
                <span href="{{ route('logout') }}" class="mx-3 cursor-pointer" style="font-size: 14px; font-weight: 800" > <a href="{{ route('register') }}"> Sign Up</a></span>
            </div>
        @endguest
        <!-- User Dropdown -->
        <div x-cloak x-data="{ open: false }" @mouseleave="open = false" class="flex flex-col mx-3 text-white">
            <button  @mouseover="open = true" class="flex flex-col">
                <span class="" style="font-size: 12px" >Returns</span>
                <span class="" style="font-size: 14px; font-weight: 800;" >& Orders</span>
            </button>

            <div x-show="open"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="absolute right-4 text-gray-500 bg-white rounded-lg shadow-xl w-96 mt-10">
                <a href="{{ route('user.orders') }}" class="block px-4 py-1 hover:text-blue-400">My Orders</a>
            </div>
        </div>
        <!-- End User Dropdown -->

        <!-- Wishlist -->
        @livewire('wishlist-count-component')

        <!-- Cart -->
        @livewire('cart-count-component')
    </div>
</div>

    {{ $slot }}

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script></body>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Alpine -->
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js" integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/qusvrsktzfxlcpbo15prhhnh8bdnzr4bkhy6k9y35ilmacg6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @livewireScripts

    @stack('scripts')
</body>
</html>
