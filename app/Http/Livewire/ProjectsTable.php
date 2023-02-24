<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsTable extends Component
{
    use WithPagination;
    public $titulo;
    public $buscador;
    public $campoOrden = "id";
    public $orden = "asc";

    public function render()
    {
        $url = '/storage/img/';
        $projects = Project::where('titulo', 'like', '%'.$this->buscador.'%')
            ->orderBy($this->campoOrden, $this->orden)
            ->paginate(3);
        return view('livewire.projects-table')->with('projects', $projects)->with('url', $url);
    }

    public function ordenar($campo) {
        if ($this->campoOrden == $campo) {
            if ($this->orden == "desc") {
                $this->orden = "asc";
            } else {
                $this->orden = "desc";
            }
        }
        $this->campoOrden = $campo;
    }

    /**
     * RESETEAR PAGINACIÓN CUANDO SE USE EL BUSCADOR
     */
    public function updatingBuscador() {
        $this->resetPage();
    }
}
