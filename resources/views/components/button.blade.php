@props(['link', 'theme' => 'primary', 'classes' => null])

@if ($theme === 'primary')
    <a href="{{ $link }}" class="text-[#23243D] bg-gray-100 ml-auto mr-auto w-3/4 py-3 px-4 font-bold uppercase rounded-full text-center lg:w-1/3">
       {{$slot}}
    </a> 

@elseif ($theme === 'secondary')
    <a href="{{ $link }}" class="w-3/4 px-4 py-3 ml-auto mr-auto text-center text-gray-100 rounded-full lg:w-1/3">
       {{$slot}}
    </a> 
@endif
