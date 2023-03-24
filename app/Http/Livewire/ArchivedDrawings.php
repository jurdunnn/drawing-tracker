<?php

namespace App\Http\Livewire;

use App\Models\Drawing;
use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Component;

class ArchivedDrawings extends Component
{
    public Project $project;

    public Collection $drawings;

    public function mount()
    {
        $this->drawings = $this->project
            ->drawings
            ->where('done', true)
            // Avoid drawings without due dates being sorted at the top.
            ->sortBy(function ($project) {
                return $project->due_date ?: now()->addCenturies(99);
            });
    }

    public function render()
    {
        return view('livewire.archived-drawings')->layout('components.layouts.app');
    }

    public function removeFromArchive(Drawing $drawing)
    {
        $drawing->update([
            'done' => false,
        ]);

        return redirect(request()->header('Referer'));
    }
}
