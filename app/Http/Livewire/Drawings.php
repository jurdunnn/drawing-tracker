<?php

namespace App\Http\Livewire;

use App\Models\Drawing;
use App\Models\Project;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Drawings extends Component
{
    public Project $project;

    public Collection $drawings;

    public Collection $tags;

    public string $activeTab;

    public function mount(Project $project)
    {
        $this->drawings = $project
            ->drawings
            ->where('done', false)
            // Avoid drawings without due dates being sorted at the top.
            ->sortBy(function ($project) {
                return $project->due_date ?: Carbon::now()->addCenturies(99);
            });

        $this->project = $project;

        $this->activeTab = 'All Drawings';

        $this->tags = Tag::all();
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

    public function archiveDrawing(Drawing $drawing)
    {
        $drawing->update([
            'done' => true,
        ]);

        return redirect(request()->header('Referer'));
    }

    public function hideProjectTag(Tag $tag)
    {
        $this->project->showTags()->create([
            'tag_id' => $tag->id,
        ]);
    }

    public function deleteDrawing(Drawing $drawing)
    {
        $drawing->delete();

        return redirect($this->project->showRoute());
    }

    public function downloadDrawing(Drawing $drawing)
    {
        return Storage::download($drawing->file_path, $drawing->name);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;

        $this->drawings = $this->project
            ->drawings
            ->where('done', false)
            ->filter(function ($drawing) {
                if ($this->activeTab === 'All Drawings') {
                    return true;
                }

                return $drawing->tag->name === $this->activeTab;
            })->sortBy(function ($project) {
                return $project->due_date ?: Carbon::now()->addCenturies(99);
            });
    }
}
