@props(['sliders'])

{{-- @dump($sliders) --}}
<section class="carousel" data-flickity='{ "autoPlay": true, "freeScroll": true, "wrapAround": true }'>
    @foreach($sliders as $slider)
    <div class="carousel-cell p-4">
        <div class="flex flex-col rounded shadow overflow-hidden">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="{{ asset('assets/images/sliders/') }}/{{ $slider->image }}" alt="Product Sliders">
            </div>
        </div>
    </div>
    @endforeach
</section>
