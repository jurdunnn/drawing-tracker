<?php

namespace App\Http\Livewire;

use App\Models\Project;
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
}
