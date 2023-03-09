<div class="w-full max-h-[100vh] h-screen p-4 grid grid-cols-1 md:grid-cols-2 gap-4" wire:poll.500ms>
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :closeRoute="route('projects.index')">
            <x-item-list name="All" :items="$project->drawings"></x-item-list>

            @if ($project->drawings->first())
                @foreach ($project->drawings->first()->tag->getAvailableTags() as $tag)
                    @if ($project->taggedDrawings($tag))
                        <x-item-list name="{{ $tag->name }}" :tag="$tag" :items="$project->taggedDrawings($tag)"></x-item-list>
                    @endif
                @endforeach
            @endif
        </x-view-contents>

        @php
            $buttonColor = "{$project->color->name}-500";

            $buttons = [
                [
                    'link' => '#',
                    'icon' => 'trash',
                    'buttonColor' => 'red-500',
                ],
                [
                    'link' => $project->editRoute(),
                    'icon' => 'pencil',
                    'buttonColor' =>  $buttonColor,
                ],
                [
                    'link' => route('projects.drawings.create', ['project' => $this->project->id]),
                    'icon' => 'plus',
                    'buttonColor' => $buttonColor,
                ],
            ];
        @endphp

        <x-toolbelt :buttons="$buttons" :color="$buttonColor"/>
    </x-view-wrapper>
</div>
