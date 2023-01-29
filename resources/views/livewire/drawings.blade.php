<div class="w-full min-h-screen p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <livewire:projects />

    <div class="bg-gray-100 shadow-2xl rounded-3xl">
        <div class="relative flex flex-col h-full p-8 text-gray-500">
            <div class="flex justify-end gap-x-4">
                <a href="{{ $project->editRoute() }}" class="text-{{ $project->color->name }}-500 cursor-pointer hover:scale-110 hover:text-{{ $project->color->name }}-600">
                    <i class="fa-solid fa-pencil fa-2xl"></i>
                </a>
            </div>
            
            <div class="flex flex-col px-2 mt-4 md:px-12 gap-y-24">
                <div class="flex flex-col gap-y-3">
                    <h3 class="text-4xl font-bold text-gray-800">{{ $project->name }}</h3>
                    <p class="max-w-lg">{{ $project->description }}</p>
                </div>

                <div class="flex flex-col gap-y-4">
                    <div class="flex justify-between pb-6 border-b-2">
                        <h3 class="text-2xl font-bold text-gray-700">Current</h3>
                        <span class="pt-2 text-gray-600">
                            <i class="fa-solid fa-ellipsis fa-2xl"></i>
                        </span>
                    </div>

                    <ul class="flex flex-col gap-y-8">
                        @foreach($project->drawings as $drawing)
                            <li class="flex flex-col justify-between gap-y-4 md:flex-row">
                                <div class="flex gap-x-2 md:gap-x-4">
                                    <!-- Check box -->
                                    <div class="flex w-8 h-8 px-4 text-3xl font-bold bg-{{ $project->color->name }}-500 rounded-full shadow-2xl cursor-pointer hover:scale-110 hover:bg-{{ $project->color->name }}-600">
                                        <span class="-ml-2 text-[1rem] text-white">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                    </div>

                                    <!-- Drawing Description -->
                                    <p class="leading-[2rem]">{{ $drawing->name }}</p>
                                </div>

                                <div class="flex items-center w-32 font-bold text-center text-white bg-{{ $drawing->tag->color->name }}-500 opacity-[0.6] rounded-full cursor-pointer hover:scale-105">
                                    <p class="w-32">{{ $drawing->tag->name }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <a href="{{ route('projects.drawings.create', ['project' => $this->project->id]) }}" class="absolute flex flex-col cursor-pointer bottom-4 right-4 max-w-content gap-y-2 hover:scale-105">
                <div class="flex items-center justify-center w-16 h-16 ml-auto mr-auto text-3xl font-bold text-white bg-{{ $project->color->name }}-500 shadow-2xl rounded-2xl">
                    <span class="pt-2">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>
