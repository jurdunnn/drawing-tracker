<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        $projects = Auth::user()->projects->all();

        return view('livewire.projects', [
            'projects' => $projects,
        ])->layout('layouts.app');
    }
}
