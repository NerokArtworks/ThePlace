<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $nombre;
    public $buscador;
    public $campoOrden = "id";
    public $orden = "asc";

    public function render()
    {
        $url = '/storage/img/';
        $users = User::where('name', 'like', '%'.$this->buscador.'%')
            ->orderBy($this->campoOrden, $this->orden)
            ->paginate(3);
        return view('livewire.users-table')->with('users', $users)->with('url', $url);
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
