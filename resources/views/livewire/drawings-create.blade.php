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
                            <label for="file_path">Drawing URL</label>
                            <x-input model="drawing.file_path" type="text" name="file_path" class="w-full"/>
                        </div>


                        <div>
                            <label for="file_input">Upload file</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div> 
                        </div>

                        <div>
                            <label for="Due Date">Due date</label>
                            <x-input model="drawing.due_date" type="date" name="Due Date" class="w-full"/>
                        </div>

                        <div>
                            <label for="Start Date">Start Date</label>
                            <x-input model="drawing.start_date" type="date" name="Start Date" class="w-full"/>
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
