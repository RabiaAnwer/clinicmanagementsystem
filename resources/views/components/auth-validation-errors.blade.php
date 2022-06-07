@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} class=" mt-3 pt-2 text-sm bg-red-600 h-10 rounded-lg w-3/6 ">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach

    </div>
@endif
