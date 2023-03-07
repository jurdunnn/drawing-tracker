@props(['item'])

<li class="flex flex-col justify-between pt-2 md:flex-row">
    <div class="flex gap-x-2 md:gap-x-4">
        <!-- Check box -->
        <div class="flex w-8 h-8 px-4 text-3xl font-bold bg-{{ $item->project->color->name }}-500 rounded-full shadow-2xl cursor-pointer hover:scale-110 hover:bg-{{ $item->project->color->name }}-600">
            <span class="-ml-2 text-[1rem] text-white">
                <i class="fa-solid fa-check"></i>
            </span>
        </div>

        <!-- Drawing Description -->
        <p class="leading-[2rem]">{{ $item->name }}</p>
    </div>

    <a href="{{ route('projects.drawings.edit', ['project' => $item->project->id, 'drawing' => $item->id]) }}" class="flex items-center w-32 font-bold text-center text-white bg-{{ $item->tag->color->name }}-500 opacity-[0.6] rounded-full cursor-pointer hover:scale-105">
        <p class="w-32">{{ $item->tag->name }}</p>
    </a>
</li>
