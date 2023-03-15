<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :backRoute="$project->showRoute()" :closeRoute="$project->indexRoute()">
            <div class="flex flex-col px-2 mt-4 md:px-8 gap-y-24">
                <div class="flex flex-col gap-y-6">
                    <form wire:submit.prevent="submit" class="flex flex-col gap-y-6">
                        <div>
                            <label for="name">Drawing Name</label>
                            <x-input model="drawing.name" type="text" name="name" class="w-full"/>
                        </div>

                        <div>
                            <label for="file_path">Drawing</label>
                            <x-input model="drawing.file_path" type="file" name="file_path" class="w-full"/>
                        </div>

                        <div>
                            <label for="Start Date">Start Date</label>
                            <x-input model="drawing.start_date" type="date" name="Start Date" class="w-full"/>
                        </div>

                        <div>
                            <label for="Due Date">Due date</label>
                            <x-input model="drawing.due_date" type="date" name="Due Date" class="w-full"/>
                        </div>

                        <div>
                            <label>Tag</label>
                            <div class="flex flex-row mt-2 gap-x-6">
                                @foreach($tags as $tag)
                                    <a wire:click="setTag({{ $tag }})" class="flex items-center w-32 font-bold text-center text-white bg-{{ $tag->color->name }}-500 opacity-[0.6] rounded-full cursor-pointer slow-hover hover:scale-105">
                                        <p class="w-32">{{ $tag->name }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        @if ($updating)
                            <div class="flex gap-x-4 leading-[2rem]">
                                <label for="Done">Mark as Done</label>
                                <x-input model="drawing.done" type="checkbox" name="Done" value="false" theme="none" class="bg-[#434458] hover:scale-110 cursor-pointer checked:bg-[#434458]"/>
                            </div>
                        @endif

                        <button 
                            type="submit" 
                            class="@if($project->color) bg-{{ $project->color->name }}-500 @endif w-1/3 p-4 mt-12 ml-auto mr-auto font-bold text-gray-100 bg-[#434458] slow-hover hover:scale-105 rounded-2xl">
                            {{ $updating ? 'Update' : 'Create' }}
                        </button>

                        @if ($updating)
                            <button 
                                wire:click="delete"
                                class="w-1/3 p-4 ml-auto mr-auto font-bold text-red-500 underline slow-hover hover:scale-105">
                                Delete Drawing 
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </x-view-contents>

    </x-view-wrapper>
    </x-split-project-drawing-view>
