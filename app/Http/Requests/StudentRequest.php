<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(){
        return [
            'name.required'   => 'El nombre es requerido',
            'name.string'     => 'Debe ingresar solo caracteres',
            'name.max'        => 'El titulo requiere maximo 255 caracteres',

            'lastname.required'   => 'El apellido es requerido',
            'lastname.string'     => 'Debe ingresar solo caracteres',
            'lastname.max'        => 'El titulo requiere maximo 255 caracteres',

            'email.required'   => 'La descripción es requerida',
            'email.string'     => 'Debe ingresar solo caracteres',
            'email.email'      => 'El formato del correo no es valido',
            'email.unique'     => 'El correo ya existe',

            'age.required'   => 'La edad es requerida',
            'age.numeric'     => 'Debe ingresar solo numeros',
            'age.max'        => 'La edad requiere un maximo de 2 numeros',
            'age.min'        => 'La edad requiere un minimo de 1 numeros',

            'phone.required'   => 'El telefono es requerido',
            'phone.numeric'     => 'Debe ingresar solo numeros',
            'phone.max'        => 'El telefono requiere un maximo de 9 numeros',
            'phone.min'        => 'El telefono requiere un minimo de 9 numeros',

            'address.required'   => 'La direccion es requerida',
            'address.max'        => 'La direccion requiere maximo 255 caracteres',

            'father.required'   => 'El nombre del padre es requerido',
            'father.string'     => 'Debe ingresar solo caracteres',
            'father.max'        => 'El nombre del padre requiere maximo 255 caracteres',

            'mother.required'   => 'El nombre de la madre es requerido',
            'mother.string'     => 'Debe ingresar solo caracteres',
            'mother.max'        => 'El nombre de la madre requiere maximo 255 caracteres',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'lastname'          => 'required|string|max:255',
            'email'         => 'required|string|email|unique:users,email',
            'age'         => 'required|numeric|min:1|min:1',
            'phone'         => 'required|numeric|min:8',
            'address'          => 'required|max:255',
            'father'          => 'required|string|max:255',
            'mother'          => 'required|string|max:255',
        ];
    }
}
