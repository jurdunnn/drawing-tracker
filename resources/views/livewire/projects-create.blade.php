<div class="w-full min-h-screen p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <livewire:projects />

    <div class="bg-gray-100 shadow-2xl rounded-3xl">
        <div class="relative flex flex-col h-full p-8 text-gray-500">
            <div class="flex flex-col px-2 mt-4 md:px-12 gap-y-24">
                <div class="flex flex-col gap-y-6">
                    <h3 class="text-4xl font-bold text-gray-800">New Project</h3>

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
                            <div class="flex flex-row mt-2 gap-x-6">
                                <a wire:click="setColor('blue')" class="w-8 h-8 bg-blue-500 rounded-full cursor-pointer hover:scale-105"></a>
                                <a wire:click="setColor('yellow')" class="w-8 h-8 bg-yellow-500 rounded-full cursor-pointer hover:scale-105"></a>
                                <a wire:click="setColor('red')" class="w-8 h-8 bg-red-500 rounded-full cursor-pointer hover:scale-105"></a>
                                <a wire:click="setColor('green')" class="w-8 h-8 bg-green-500 rounded-full cursor-pointer hover:scale-105"></a>
                                <a wire:click="setColor('teal')" class="w-8 h-8 bg-teal-500 rounded-full cursor-pointer hover:scale-105"></a>
                                <a wire:click="setColor('orange')" class="w-8 h-8 bg-orange-500 rounded-full cursor-pointer hover:scale-105"></a>
                                <a wire:click="setColor('purple')" class="w-8 h-8 bg-purple-500 rounded-full cursor-pointer hover:scale-105"></a>
                            </div>
                        </div>

                        <button 
                            type="submit" 
                            class="@if($project->color) bg-{{ $project->color->name }}-500 @endif w-1/3 p-4 mt-12 ml-auto mr-auto font-bold text-gray-100 bg-[#434458] hover:scale-105 rounded-2xl">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
