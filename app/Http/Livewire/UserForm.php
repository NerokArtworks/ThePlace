<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;

class UserForm extends Component
{
    public $user, $user_id;
    // public $name, $lastname, $dni, $email, $rol;

    public function mount() {
        $this->user = User::find($this->user_id);
    }

    public function update() {
        try {
            // Validar según $rules
            $this->validate([
                'user.name' => 'required|unique:users',
                'user.lastname' => 'required',
                'user.dni' => 'required|unique:users',
                'user.email' => 'required|email|unique:users,email,' . $this->user->id,
                'user.rol' => ['required', ValidationRule::in(['user', 'admin'])],
            ]);

            $this->user->save();
            return redirect()->route('admin.index')->with('status', 'Usuario actualizado con éxito.');
        } catch (QueryException $ex) {
            return redirect()->route('admin.show')->with('admin', $this->user_id)->with('status', "No se ha podido actualizar el usuario correctamente");
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
