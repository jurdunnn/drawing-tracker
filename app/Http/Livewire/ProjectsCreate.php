<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Project;
use App\Models\ProjectShowTag;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectsCreate extends Component
{
    public Project $project;
    public bool $updating;

    protected $rules = [
        'project.name' => 'required|max:60',
        'project.description' => 'required|max:255',
        'project.color_id' => 'int|required',
    ];

    public function mount(?Project $project)
    {
        $this->updating = $project->name ? true : false;

        $this->project = $project ?: new Project();
    }

    public function render()
    {
        return view('livewire.projects-create')->layout('components.layouts.app');
    }

    public function setColor($color)
    {
        if ($this->updating) {
            $this->project->update([
                'color_id' => Color::where('name', $color)->first()->id
            ]);

            return;
        }

        $this->project->color_id = Color::where('name', $color)->first()->id;
    }

    public function deleteShowTag(ProjectShowTag $showTag)
    {
        $showTag->delete();
    }

    public function delete()
    {
        Project::findOrFail($this->project->id)->delete();

        return redirect()->route('projects.index');
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
