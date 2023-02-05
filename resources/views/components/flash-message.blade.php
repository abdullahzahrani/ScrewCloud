@if (Session::has('message'))
    <div class="bg-green-400 px-4 py-2 rounded my-1">
        {{ Session::get('message') }}
    </div>
@endif
