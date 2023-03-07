<div class="w-full min-h-screen p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <livewire:projects />

    <x-view-wrapper>
        <x-button 
                link="{{ route('projects.index') }}" 
                icon="fa-xmark fa-2xl" 
                buttonClasses="max-w-content text-sm text-gray-800"
                theme="none"
            >
        </x-button>

        <x-button 
                link="{{ $project->editRoute() }}" 
                icon="fa-pencil fa-2xl" 
                buttonClasses="text-{{ $project->color->name }}-500 ml-auto cursor-pointer hover:scale-110 hover:text-{{ $project->color->name }}-600"
                theme="none"
            >
        </x-button>

        <x-view-contents :item="$project">
            <x-item-list name="Current" :items="$project->drawings" />
        </x-view-contents>

        <a href="{{ route('projects.drawings.create', ['project' => $this->project->id]) }}" class="absolute flex flex-col cursor-pointer bottom-4 right-4 max-w-content gap-y-2 hover:scale-105">
            <div class="flex items-center justify-center w-16 h-16 ml-auto mr-auto text-3xl font-bold text-white bg-{{ $project->color->name }}-500 shadow-2xl rounded-2xl">
                <span class="pt-2">
                    <i class="fa-solid fa-plus"></i>
                </span>
            </div>
        </a>
    </x-view-wrapper>
</div>
