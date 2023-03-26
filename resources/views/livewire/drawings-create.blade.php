<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :backRoute="$project->showRoute()" :closeRoute="$project->indexRoute()">
            <div class="flex flex-col px-2 mt-4 md:px-8 gap-y-24">
                <div class="flex flex-col gap-y-6">
                    <form wire:submit.prevent="submit" class="flex flex-col gap-y-14">
                        <div>
                            <x-input model="drawing.name" type="text" name="name" label="Drawing Name*" placeholder="Name" class="w-full"/>
                        </div>

                        <div>
                            <x-input model="file" type="file" name="file" label="File*" class="w-full"/>
                        </div>

                        <div class="flex flex-col justify-between lg:flex-row gap-x-4">
                            <div class="w-full">
                                <label for="Start Date">Start Date</label>
                                <x-input model="drawing.start_date" type="date" name="Start Date" class="w-full"/>
                            </div>

                            <div class="w-full">
                                <label for="Due Date">Due date</label>
                                <x-input model="drawing.due_date" type="date" name="Due Date" class="w-full"/>
                            </div>
                        </div>

                        <div>
                            <label>Tag*</label>
                            <div class="flex flex-wrap mt-4 gap-6">
                                @foreach($tags as $tag)
                                    <a 
                                        wire:click="setTag({{ $tag }})" 
                                        class="flex items-center mx-auto md:mx-0 w-32 font-bold select-none text-center @if($drawing->tag_id == $tag->id) animate-bounce @endif text-white bg-{{ $tag->color->name }}-500 opacity-[0.6] rounded-full cursor-pointer slow-hover hover:scale-105"
                                        >
                                        <p class="w-32">{{ $tag->name }}</p>
                                    </a>
                                @endforeach
                            </div>

                            @if ($errors->has('drawing.tag_id'))
                                <p class="mt-2 font-bold text-red-500">{{ $errors->first('drawing.tag_id') }}</p>
                            @endif
                        </div>

                        <x-button type="submit" buttonColor="bg-{{ $project->color ? $project->color->name . '-500'  : 'primary-dark' }} text-white"  buttonTag="button" theme="primary">
                            {{ $updating ? 'Update' : 'Create' }}
                        </x-button>
                    </form>
                </div>
            </div>
        </x-view-contents>

    </x-view-wrapper>
    </x-split-project-drawing-view>
