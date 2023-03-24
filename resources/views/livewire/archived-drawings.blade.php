<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :backRoute="$project->showRoute()" :closeRoute="route('projects.index')">
            @if ($project->drawings->where('done', true)->count() > 0)
                <ul class="flex flex-col gap-y-4">
                    @foreach($drawings as $drawing)
                        <li class="flex flex-col justify-between h-full px-4 py-2 hover:scale-[101%] hover:bg-gray-200 rounded-md md:flex-row @if($drawing->due_date && $drawing->due_date < now()) text-red-500 @endif">
                            <div class="flex w-full select-none gap-x-4">
                                <div data-tippy-content="{{$drawing->tag->name}}" class="flex shrink-0 text-white select-none font-bold items-center justify-center w-5 h-5 my-auto bg-{{ $drawing->tag->color->name }}-500 rounded-md">
                                </div>
                                <div class="flex flex-col">
                                    <h4 class="font-bold">{{ $drawing->name }}</h4>
                                    <div class="flex gap-x-2">
                                        @if ($drawing->start_date)
                                            <p class="text-xs">Start: {{ $drawing->formatted_start_date }}</p>
                                        @endif

                                        @if ($drawing->due_date)
                                            <p class="text-xs">Due: {{ $drawing->formatted_due_date }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end w-2/3 h-full mt-4 md:ml-0 md:mt-0 gap-x-4" x-data="{ confirmDelete: false }">
                                <x-button wire="removeFromArchive({{$drawing->id}})" buttonClasses="hover:scale-110 hover:bg-{{ $project->color->name }}-500 rounded-lg hover:text-white my-auto slow-hover justify-end cursor-pointer py-2 px-2" theme="none">Remove From Archive</x-button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="pt-4 text-center">This project has no archived drawings.</p>
                <a 
                    class="font-bold text-center text-{{ $project->color->name }}-500 hover:underline px-12 mx-auto" 
                    href="{{ $project->showRoute() }}"
                >
                Go Back
                </a>
            @endif
        </x-view-contents>

        <x-toolbelt :color="$project->color->name">
            <x-toolbelt-button icon="trash" color="red" link="#" tooltip="Delete Project" />
            <x-toolbelt-button icon="pencil" :color="$project->color->name" :link="$project->editRoute()" tooltip="Edit Project" />
            <x-toolbelt-button icon="plus" :color="$project->color->name" :link="route('projects.drawings.create', ['project' => $this->project->id])" tooltip="Create Drawing" />
            <x-toolbelt-button icon="box-archive" :color="$project->color->name" link="#" tooltip="Archived Drawings" />
        </x-toolbelt>
    </x-view-wrapper>
</x-split-project-drawing-view>
