<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :closeRoute="route('projects.index')">
            @if ($project->drawings->where('done', false)->count() > 0)
                <div class="flex flex-row flex-wrap justify-between w-full py-2 text-md gap-x-2">
                    <button 
                        @class([
                            'px-3 py-2 my-3 ml-auto mr-auto font-bold text-center cursor-pointer hover:scale-105 slow-hover rounded-xl hover:bg-gray-500 hover:text-white',
                            'bg-gray-500 text-white' => $activeTab === 'All Drawings',
                        ])
                        wire:click="setActiveTab('All Drawings')"
                        >
                        All Drawings
                    </button>

                    @foreach ($project->drawings->first()->tag->getAvailableTags() as $tag)
                        <button 
                            @class([
                                "px-3 py-2 my-3 ml-auto mr-auto font-bold text-center cursor-pointer hover:scale-105 slow-hover rounded-xl hover:bg-{$tag->color->name}-500 hover:text-white",
                                "bg-{$tag->color->name}-500 text-white" => $activeTab === $tag->name,
                            ])
                            wire:click="setActiveTab('{{ $tag->name }}')"
                            >
                            {{ $tag->name }}
                        </button>
                    @endforeach
                </div>

                <ul class="flex flex-col gap-y-4">
                    @foreach($drawings as $drawing)
                        <li class="flex flex-col justify-between h-full px-4 py-2 hover:scale-[101%] hover:bg-gray-200 rounded-md md:flex-row @if($drawing->due_date && $drawing->due_date < now()) text-red-500 @endif">
                            <a x-on:click="selectedDrawing = {{ $drawing->id }}" class="flex w-full cursor-pointer gap-x-4">
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
                            </a>

                            <div class="flex items-center mt-4 ml-9 md:ml-0 md:mt-0 gap-x-4" x-data="{ confirmDelete: false }">
                                <!-- Delete Button and Delete confirmation -->
                                <x-button xclick="confirmDelete = true" x-show="!confirmDelete" x-cloak icon="fa-trash fa-lg" tooltip="Delete" iconColor="text-red-500" buttonClasses="hover:scale-110 slow-hover cursor-pointer" theme="none" />
                                <div class="flex gap-x-2" x-show="confirmDelete" x-cloak>
                                    <x-button xclick="confirmDelete = false" icon="fa-xmark fa-lg" tooltip="Cancel" iconColor="text-gray-500" buttonClasses="hover:scale-110 slow-hover cursor-pointer" theme="none" />
                                    <x-button wire="deleteDrawing({{$drawing->id}})" icon="fa-check fa-lg" tooltip="Confirm Delete" iconColor="text-red-500" buttonClasses="hover:scale-110 slow-hover cursor-pointer" theme="none" />
                                </div>

                                <!-- Other Buttons -->
                                <x-button wire="archiveDrawing({{$drawing->id}})" icon="fa-box-archive fa-lg" tooltip="Archive" iconColor="text-{{ $drawing->project->color->name }}-500" buttonClasses="hover:scale-110 slow-hover cursor-pointer" theme="none" />
                                <x-button :link="$drawing->showRoute()" icon="fa-pencil fa-lg" tooltip="Edit" iconColor="text-{{ $drawing->project->color->name }}-500" buttonClasses="hover:scale-110 slow-hover" theme="none" />
                                <x-button wire="downloadDrawing({{$drawing->id}})" icon="fa-download fa-lg" tooltip="Download" iconColor="text-{{ $drawing->project->color->name }}-500" buttonClasses="hover:scale-110 slow-hover cursor-pointer" theme="none" />
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="pt-4 text-center">This project has no drawings.</p>
                <a 
                    class="font-bold text-center text-{{ $project->color->name }}-500 hover:underline px-12 mx-auto" 
                    href="{{ route('projects.drawings.create', ['project' => $this->project->id]) }}"
                >
                Add a drawing
                </a>
            @endif
        </x-view-contents>

        <x-toolbelt :color="$project->color->name">
            <x-toolbelt-button icon="trash" color="red" link="#" tooltip="Delete Project" />
            <x-toolbelt-button icon="pencil" :color="$project->color->name" :link="$project->editRoute()" tooltip="Edit Project" />
            <x-toolbelt-button icon="plus" :color="$project->color->name" :link="route('projects.drawings.create', ['project' => $this->project->id])" tooltip="Create Drawing" />
            <x-toolbelt-button icon="box-archive" :color="$project->color->name" :link="route('projects.drawings.archived', ['project' => $this->project->id])" tooltip="Archived Drawings" />
        </x-toolbelt>
    </x-view-wrapper>
</x-split-project-drawing-view>
