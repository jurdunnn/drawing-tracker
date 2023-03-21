<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :closeRoute="route('projects.index')">
            @if ($project->drawings->count() > 0)
                <div class="flex flex-row flex-wrap justify-between w-full py-2 gap-x-4">
                    <button 
                        @class([
                            'px-4 py-3 my-2 ml-auto mr-auto font-bold text-center cursor-pointer hover:scale-110 slow-hover rounded-xl hover:bg-gray-500 hover:text-white',
                            'bg-gray-500 text-white' => $activeTab === 'All Drawings',
                        ])
                        wire:click="setActiveTab('All Drawings')"
                        >
                        All Drawings
                    </button>

                    @foreach ($project->drawings->first()->tag->getAvailableTags() as $tag)
                        <button 
                            @class([
                                "px-4 py-3 my-2 ml-auto mr-auto font-bold text-center cursor-pointer hover:scale-110 slow-hover rounded-xl hover:bg-{$tag->color->name}-500 hover:text-white",
                                "bg-{$tag->color->name}-500 text-white" => $activeTab === $tag->name,
                            ])
                            wire:click="setActiveTab('{{ $tag->name }}')"
                            >
                            {{ $tag->name }}
                        </button>
                    @endforeach
                </div>

                <x-item-list :items="$drawings"/>
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
            <x-toolbelt-button icon="box-archive" :color="$project->color->name" link="#" tooltip="Completed Drawings" />
        </x-toolbelt>
    </x-view-wrapper>
</x-split-project-drawing-view>
