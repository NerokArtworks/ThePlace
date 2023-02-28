<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectForm extends Component
{
    use WithFileUploads;
    public $mostrar = false;
    public $project_id, $titulo, $descripcion, $nuevaImagen, $imagen;
    public $project;
    public $url = 'storage/img/';

    /**
     * Reglas de form
     */
    protected $rules = [
        'titulo'=>'required|max:10',
        'descripcion'=>'required',
        'imagen' => 'required|image|nullable'
    ];

    public function mount($project_id)
    {
        $project = Project::findOrFail($project_id);
        $this->titulo = $project->titulo;
        $this->descripcion = $project->description;
        $this->imagen = $project->imagen;
        $this->project_id = $project_id;
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project-form');
    }

    public function toggleForm() {
        $this->mostrar = !$this->mostrar;
    }

    public function update() {
        try {
            // Validar según $rules
            $this->validate();

            $project = Project::findOrFail($this->project_id);

            $project->titulo = $this->titulo;
            $project->description = $this->descripcion;

            if ($this->nuevaImagen != null) {
                $nombreFoto = time() . "-" . $this->nuevaImagen->getClientOriginalName();
                // Storage::putFileAs('app/public/img', $this->imagen, $nombreFoto);
                $this->nuevaImagen->storeAs('/img', $nombreFoto, 'public');
                $project->nuevaImagen = $nombreFoto;
            }

            $project->save();

            session()->flash('status', 'El proyecto ha sido actualizado.');

            return redirect()->route('projects.show', ['project'=>$this->project_id]);
        } catch (QueryException $ex) {
            session()->flash('status', 'El proyecto no ha sido actualizado.');
            // $this->mostrar = false;
            // $this->emit('ProjectForm');
            return redirect()->route('projects.show', ['project'=>$this->project_id])->with('status', $ex->getMessage());
        }
    }

    /**
     * Valida de forma asíncrona cada campo usando wire:model (quitar .defer de los campos que lo tengan para que pueda validarlos)
     * Este método se llama automáticamente al hacer cambios en esos campos
     * https://laravel-livewire.com/docs/2.x/lifecycle-hooks#class-hooks
     */
    public function updated($input) {
        $this->validateOnly($input);
        if ($input == "nuevaImagen") {
            $this->imagen = null;
        }
    }
}
