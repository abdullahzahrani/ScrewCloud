<section class="sticky top-0 flex items-center" style=" height:60px; z-index: 100; background-color: #131921;">
    <a href="/" class="text-3xl font-bold mx-3">
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
                        <a href="{{ route('admin.products') }}" class="block px-4 py-1 hover:text-blue-400">All Products</a>
                        <a href="{{ route('admin.orders') }}" class="block px-4 py-1 hover:text-blue-400">Orders</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-1 hover:text-blue-400"
                            class="block w-full px-4 py-2 text-sm text-left hover:bg-gray-100 focus:outline-none focus:ring focus:ring-aqua-400 disabled:text-gray-500"
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
</section>
