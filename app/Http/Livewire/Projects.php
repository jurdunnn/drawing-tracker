<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        $projects = Auth::user()
            ->projects
            ->sortByDesc('last_opened')
            ->collect();

        return view('livewire.projects', [
            'projects' => $projects,
        ])->layout('components.layouts.app');
    }

    public function redirectToProject(Project $project)
    {
        $project->update([
            'last_opened' => now(),
        ]);

        return redirect($project->showRoute());
    }
}
