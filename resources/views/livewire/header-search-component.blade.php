<div class="flex-1">
    <form action="{{ route('product.search') }}">
        <div class="flex">
        <input type="text" name="search" value="{{ $search }}" class="w-full border-none rounded-l-md" style="height: px; padding: 10px" placeholder="Search here ..." >
        <button type="submit">
            <x-heroicon-o-search class="rounded-r-md" style="padding: 5px; height: 45px !important; background-color:#cd9042; " />
        </button>
        </div>
    </form>
</div>
