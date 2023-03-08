<?php

namespace App\Http\Livewire;

use App\Models\Drawing;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Livewire\Component;

class Drawings extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.drawings')->layout('components.layouts.app');
    }

    public function setDrawingTag(Drawing $drawing, Tag $tag)
    {
        $drawing->update([
            'tag_id' => $tag->id,
        ]);
    }

    public function hideProjectTag(Tag $tag)
    {
        $this->project->showTags()->create([
            'tag_id' => $tag->id,
        ]);
    }
}
