<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectsCreate extends Component
{
    public Project $project;

    protected $rules = [
        'project.name' => 'required|max:60',
        'project.description' => 'required|max:255',
        'project.color_id' => 'int|required',
    ];

    public function mount()
    {
        $this->project = new Project();
    }

    public function render()
    {
        return view('livewire.projects-create');
    }

    public function setColor($color)
    {
        $this->project->color_id = Color::where('name', $color)->first()->id;
    }

    public function submit()
    {
        $this->validate();

        $this->project->user_id = Auth::user()->id;
        $this->project->last_opened = now();

        $this->project->save();

        return redirect($this->project->showRoute());
    }
}
