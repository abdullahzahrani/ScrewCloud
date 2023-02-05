<x-slot:page_title>International Shopping</x-slot>

<x-partials.sidebar :minPrice="$minPrice" :maxPrice="$maxPrice" :products="$products" :categories="$categories" />

@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider,{
            start: [1, 1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            }
        });

        slider.noUiSlider.on('update', function(value) {
            @this.set('minPrice', value[0]);
            @this.set('maxPrice', value[1]);
        });
    </script>
@endpush
