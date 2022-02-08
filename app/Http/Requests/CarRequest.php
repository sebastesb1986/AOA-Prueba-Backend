<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [

            'name' => 'Nombre',
            'model' => 'Modelo',
            'mark' => 'Marca',
            'department' => 'Departamento',
                   
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'El campo nombre no puede ir vacio.',
            'model.required' => 'El campo modelo no puede ir vacio.',
            'mark.required' => 'El campo marca no puede ir vacio.',
            'department.required' => 'Seleccione al menos un departamento.',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    
        $id = ( ($this->getMethod() === 'PUT') ? $this->id : null);

        return [

            'name' => 'required',
            'model' => 'required',
            'mark' => 'required',
            //'department' => 'required', 

        ];
    }
}
