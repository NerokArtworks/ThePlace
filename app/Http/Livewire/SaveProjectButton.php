<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * OPCIÓN NO ASÍNCRONA DE GUARDAR PROYECTOS
 */
class SaveProjectButton extends Component
{
    public $savedProjects;
    public $project;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->savedProjects = $user->savedprojects()->pluck('project_id')->toArray();
    }

    public function toggleSaveProject($project_id)
    {
        $user = User::find(Auth::user()->id);
        if (in_array($project_id, $this->savedProjects)) {
            $user->savedProjects()->detach($project_id);
            $this->savedProjects = array_diff($this->savedProjects, [$project_id]);
        } else {
            $user->savedProjects()->attach($project_id, ['save_date' => now()]);
            $this->savedProjects[] = $project_id;
        }
    }

    public function render()
    {
        return view('livewire.save-project-button')->with('project', $this->project);
    }
}
