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

    public Collection $drawings;

    public string $activeTab;

    public function mount(Project $project)
    {
        $this->drawings = $project->drawings;

        $this->project = $project;

        $this->activeTab = 'All Drawings';
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

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;

        $this->drawings = $this->project->drawings->filter(function ($drawing) {
            if ($this->activeTab === 'All Drawings') {
                return true;
            }

            return $drawing->tag->name === $this->activeTab;
        });
    }
}
