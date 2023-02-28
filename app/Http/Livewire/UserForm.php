<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;

class UserForm extends Component
{
    public $user, $user_id;
    public $name, $lastname, $dni, $email, $email_verified_at, $rol;

    public function mount() {
        $user = User::find($this->user_id);
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->dni = $user->dni;
        $this->email = $user->email;
        $this->rol = $user->rol;
        $this->email_verified_at = $user->email_verified_at;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'dni' => 'required|max:9',
            'email' => 'required|email',
            'rol' => ['required', ValidationRule::in(['user', 'admin'])]
        ];
    }



    public function update() {
        try {
            // Validar según $rules
            $this->validate();
            $this->user->name = $this->name;
            $this->user->lastname = $this->lastname;
            $this->user->dni = $this->dni;
            $this->user->email = $this->email;
            $this->user->rol = $this->rol;
            $this->user->save();
            // dd("aaaa");
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
        $this->user->input = value($input);
    }
}
