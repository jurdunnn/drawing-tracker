<?php

namespace App\Http\Livewire;

use App\Models\Drawing;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DrawingsCreate extends Component
{
    use WithFileUploads;

    public Project $project;
    public ?Drawing $drawing;
    public $file;
    public $updating;

    protected $rules = [
        'file' => 'required_if:drawing.file_path,!null|image|max:20000',
        'drawing.tag_id' => 'int|required',
        'drawing.name' => 'string|required',
        'drawing.file_path' => 'string',
        'drawing.due_date' => 'string|nullable',
        'drawing.start_date' => 'string|nullable',
    ];

    protected $messages = [
        'drawing.file_path' => "A drawing must be uploaded.",
        'drawing.tag_id' => "A tag is required.",
    ];

    public function mount(Project $project, ?Drawing $drawing)
    {
        $this->project = $project;

        $this->drawing = $drawing ?: new Drawing();

        $this->updating = isset($drawing->id);
    }

    public function setTag($tag)
    {
        if ($this->updating) {
            $this->drawing->update([
                'tag_id' => $tag['id']
            ]);

            return;
        }

        $this->drawing->tag_id = $tag['id'];
    }

    public function submit()
    {
        if ($this->file) {
            $this->drawing->file_path = $this->file->store('files');
        }

        if ($this->updating && $this->drawing->file_path) {
            unset($this->rules['file']);
        }

        $this->validate();

        if (!$this->updating) {
            $this->drawing->done = false;
            $this->drawing->project_id = $this->project->id;
        }

        $this->drawing->save();

        return redirect($this->project->showRoute());
    }

    public function render()
    {
        $tags = Tag::all();

        return view('livewire.drawings-create', [
            'tags' => $tags,
        ])->layout('components.layouts.app');
    }
}
