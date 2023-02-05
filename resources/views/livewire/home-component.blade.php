<main class="bg-gray-200">
    <!-- Carousel -->

    {{-- <div class="">
        @include('layouts.partials.on-sale')
    </div> --}}

    <!-- Card Categories -->
    <x-partials.card  />

    <!-- Screw Cloud Latest Products -->
    <x-partials.shopCard :latestProducts="$latestProducts" />


    <!-- Footer -->
    <x-partials.footer />
</main>
