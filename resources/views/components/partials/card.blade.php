
<div>
    <div  class="grid grid-cols-4 gap-4">
        {{-- card --}}
        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-2 p-4 bg-white">
            <div class="font-bold text-xl mb-2 mt-4">Mazda</div>
                <img class="w-full" src="{{asset('img/img.png')}}" alt="Sunset in the mountains">
            <div class="px-2 py-4">
                <a href="{{ route("mazda") }}" class="inline-block bg-grey-lighter text-sm text-blue-500">Shop now</a>
            </div>
        </div>

        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-2 p-4 bg-white">
            <div class="font-bold text-xl mb-2 mt-4">Ford</div>
                <img class="w-full" src="{{asset('img/img_1.png')}}" alt="Sunset in the mountains">
            <div class="px-2 py-4">
                <a href="{{ route("ford") }}" class="inline-block bg-grey-lighter text-sm text-blue-500">Shop now</a>
            </div>
        </div>

        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-2 p-4 bg-white">
            <div class="font-bold text-xl mb-2 mt-4">Toyota</div>
                <img class="w-full" src="{{asset('img/img_2.png')}}" alt="Sunset in the mountains">
            <div class="px-2 py-4">
                <a href="{{ route("toyota") }}" class="inline-block bg-grey-lighter text-sm text-blue-500">Shop now</a>
            </div>
        </div>

        <div class="max-w-xs rounded overflow-hidden shadow-lg my-2 mx-2 p-4 bg-white">
            <div class="font-bold text-xl mb-2 mt-4">Hyundai</div>
                <img class="w-full" src="{{asset('img/img_3.png')}}" alt="Sunset in the mountains">
            <div class="px-2 py-4">
                <a href="{{ route("hyundai") }}" class="inline-block bg-grey-lighter text-sm text-blue-500">Shop now</a>
            </div>
        </div>

    </div>
</div>
