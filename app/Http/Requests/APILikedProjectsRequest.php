<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APILikedProjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Autoriza que se puedan realizar operaciones en la BD
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'matricula' => 'required', // El unique no se puede utilizar para actualizar
            'marca' => 'required',
            'modelo' => 'required',
        ];
    }
}
