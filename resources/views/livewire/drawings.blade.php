<x-split-project-drawing-view> 
    <livewire:projects />

    <x-view-wrapper>
        <x-view-contents :item="$project" :closeRoute="route('projects.index')">
            @if ($project->drawings->count() > 0)
                <x-item-list name="All" :items="$project->drawings"></x-item-list>

                @if ($project->drawings->first())
                    @foreach ($project->drawings->first()->tag->getAvailableTags() as $tag)
                        @if ($project->taggedDrawings($tag))
                            <x-item-list name="{{ $tag->name }}" :tag="$tag" :items="$project->taggedDrawings($tag)"></x-item-list>
                        @endif
                    @endforeach
                @endif
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

        @php
            $buttonColor = "{$project->color->name}-500";

            $buttons = [
                [
                    'link' => '#',
                    'icon' => 'trash',
                    'buttonColor' => 'red-500',
                    'tooltip' => 'Delete Project'
                ],
                [
                    'link' => $project->editRoute(),
                    'icon' => 'pencil',
                    'buttonColor' =>  $buttonColor,
                    'tooltip' => 'Edit Project'
                ],
                [
                    'link' => route('projects.drawings.create', ['project' => $this->project->id]),
                    'icon' => 'plus',
                    'buttonColor' => $buttonColor,
                    'tooltip' => 'Create Drawing'
                ],
            ];
        @endphp

        <x-toolbelt :buttons="$buttons" :color="$buttonColor"/>
    </x-view-wrapper>
</x-split-project-drawing-view>
