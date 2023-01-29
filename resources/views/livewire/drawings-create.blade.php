<div class="w-full min-h-screen p-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <livewire:projects />

    <div class="bg-gray-100 shadow-2xl rounded-3xl">
        <div class="relative flex flex-col h-full p-8 text-gray-500">
            <div class="flex flex-col px-2 mt-4 md:px-12 gap-y-24">
                <div class="flex flex-col gap-y-6">
                    <h3 class="text-4xl font-bold text-gray-800">{{ $updating ? 'Update' : 'New' }} Drawing</h3>

                    <form wire:submit.prevent="submit" class="flex flex-col gap-y-6">
                        <div>
                            <label for="name">Drawing Name</label>
                            <x-input model="drawing.name" type="text" name="name" class="w-full"/>
                        </div>

                        <div>
                            <label for="file_path">Drawing URL</label>
                            <x-input model="drawing.file_path" type="text" name="file_path" class="w-full"/>
                        </div>

                        <div>
                            <label for="Due Date">Due date</label>
                            <x-input model="drawing.due_date" type="text" name="Due Date" class="w-full"/>
                        </div>

                        <div>
                            <label for="Start Date">Start Date</label>
                            <x-input model="drawing.start_date" type="text" name="Start Date" class="w-full"/>
                        </div>

                        <div>
                            <label>Tag</label>
                            <div class="flex flex-row mt-2 gap-x-6">
                                @foreach($tags as $tag)
                                    <a wire:click="setTag({{ $tag }})" class="flex items-center w-32 font-bold text-center text-white bg-{{ $tag->color->name }}-500 opacity-[0.6] rounded-full cursor-pointer hover:scale-105">
                                        <p class="w-32">{{ $tag->name }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <button 
                            type="submit" 
                            class="@if($project->color) bg-{{ $project->color->name }}-500 @endif w-1/3 p-4 mt-12 ml-auto mr-auto font-bold text-gray-100 bg-[#434458] hover:scale-105 rounded-2xl">
                            {{ $updating ? 'Update' : 'Create' }}
                        </button>

                        @if ($updating)
                            <button 
                                wire:click="delete"
                                class="w-1/3 p-4 ml-auto mr-auto font-bold text-red-500 underline hover:scale-105">
                                Delete Drawing 
                            </button>
                        @endif
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
