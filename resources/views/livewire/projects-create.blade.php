<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <div class="flex justify-start max-w-lg">
            <x-button 
                link="{{ $project->id ? route('projects.drawings.index', [$project->id]) : route('projects.index') }}" 
                icon="fa-arrow-left-long fa-xl" 
                iconColor="" 
                buttonClasses="max-w-content text-gray-800 hover:font-bold slow-hover hover:scale-110"
                theme="none"
                >
                Back
            </x-button>
        </div>

        <div class="flex flex-col px-2 mt-4 md:px-12 gap-y-24">
            <div class="flex flex-col gap-y-6">
                <h2 class="font-bold text-gray-800">{{ $updating ? 'Update' : 'New' }} Project</h2>

                <form wire:submit.prevent="submit" class="flex flex-col gap-y-6">
                    <div>
                        <label for="name">Project Name</label>
                        <x-input model="project.name" type="text" name="name" class="w-full"/>
                    </div>

                    <div>
                        <label for="description">Project Description</label>
                        <x-input model="project.description" type="text" name="description" class="w-full"/>
                    </div>

                    <div>
                        <label>Color</label>
                        <div class="mt-2 grid grid-cols-6 md:grid-cols-5 lg:grid-cols-7 gap-6">
                            <a wire:click="setColor('blue')" class="w-8 h-8 bg-blue-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                            <a wire:click="setColor('yellow')" class="w-8 h-8 bg-yellow-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                            <a wire:click="setColor('red')" class="w-8 h-8 bg-red-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                            <a wire:click="setColor('green')" class="w-8 h-8 bg-green-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                            <a wire:click="setColor('teal')" class="w-8 h-8 bg-teal-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                            <a wire:click="setColor('orange')" class="w-8 h-8 bg-orange-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                            <a wire:click="setColor('purple')" class="w-8 h-8 bg-purple-500 rounded-full cursor-pointer slow-hover hover:scale-105"></a>
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="@if($project->color) bg-{{ $project->color->name }}-500 @endif w-1/3 p-4 mt-12 ml-auto mr-auto font-bold text-gray-100 bg-[#434458] slow-hover hover:scale-105 rounded-2xl">
                        {{ $updating ? 'Update' : 'Create' }}
                    </button>

                    @if ($updating)
                        <button 
                            wire:click="delete"
                            class="w-1/3 p-4 ml-auto mr-auto font-bold text-red-500 underline slow-hover hover:scale-105">
                            Delete Project 
                        </button>
                    @endif
                </form>
            </div>
        </div>
    </x-view-wrapper>
</x-split-project-drawing-view>
