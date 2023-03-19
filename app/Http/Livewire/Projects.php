<?php

namespace App\Http\Livewire;

use App\Models\Drawing;
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
        $this->projects = Project::where('user_id', Auth::user()->id)
            ->orderByDesc('last_opened')
            ->get();

        $this->search = '';
    }

    public function updatedSearch($value)
    {
        $searchQuery = Project::where('user_id', Auth::user()->id)
            ->orderByDesc('last_opened');

        if ($this->search != '') {
            $searchQuery = $searchQuery->where('name', 'like', "%{$this->search}%");

            $searchQuery = $searchQuery->orWhereHas('drawings', function ($query) {
                return $query->where('name', 'like', "%{$this->search}%");
            });
        }

        $this->projects = $searchQuery->get();
    }

    public function render()
    {
        return view('livewire.projects')->layout('components.layouts.app');
    }

    public function redirectToProject(Project $project)
    {
        if (!$project->id) {
            return;
        }

        $project->update([
            'last_opened' => now(),
        ]);

        return redirect($project->showRoute());
    }
}
