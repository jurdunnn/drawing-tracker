<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Collection;

class Projects extends Component
{
    public $search;

    public Collection $projects;

    public function mount()
    {
        $this->projects = Auth::user()
            ->projects
            ->sortByDesc('last_opened')
            ->collect();

        $this->search = '';
    }

    public function updatedSearch($value)
    {
        $query = Project::where('user_id', Auth::user()->id);

        if ($this->search != '') {
            $query = $query->where('name', 'like', "%{$this->search}%");
        }

        $this->projects = $query->get()->sortByDesc('last_opened')->collect();
    }

    public function render()
    {
        return view('livewire.projects')->layout('components.layouts.app');
    }

    public function redirectToProject(Project $project)
    {
        $project->update([
            'last_opened' => now(),
        ]);

        return redirect($project->showRoute());
    }
}
