<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProject extends Component
{
    use WithFileUploads;
    // public $mostrar = false;
    public $titulo, $descripcion, $imagen;

    /**
     * Reglas de form
     */
    protected $rules = [
        'titulo' => 'required|max:10|unique:projects',
        'descripcion' => 'required',
        'imagen' => 'required|image'
    ];

    public function render()
    {
        return view('livewire.create-project');
    }

    public function save() {
        try {
            // Validar según $rules
            $this->validate();

            $nombreFoto = time() . "-" . $this->imagen->getClientOriginalName();
            $this->imagen->storeAs('img', $nombreFoto, 'public');
            Project::create([
                'titulo' => $this->titulo,
                'description' => $this->descripcion,
                'fecha' => now(),
                'imagen' => $nombreFoto,
                'user_id' => Auth::user()->id
            ]);
            // Si uso el redirect hago una consulta al servidor para actualizar la tabla. Si uso el evento $this->emit() me ahorro la consulta
            // $this->emit('createCar');
            return redirect()->route('user-projects')->with('status', "Proyecto añadido correctamente");
            // Resetear campos si uso evento
            // $this->reset(['matricula', 'marca', 'modelo', 'year', 'color', 'fecha_ultima_revision', 'precio']);
            // $this->mostrar = false;
        } catch (QueryException $ex) {
            return redirect()->route('projects.create')->with('status', "No se ha podido subir el proyecto correctamente");
        }
    }

    /**
     * Valida de forma asíncrona cada campo usando wire:model (quitar .defer de los campos que lo tengan para que pueda validarlos)
     * Este método se llama automáticamente al hacer cambios en esos campos
     * https://laravel-livewire.com/docs/2.x/lifecycle-hooks#class-hooks
     */
    public function updated($input) {
        $this->validateOnly($input);
    }
}
