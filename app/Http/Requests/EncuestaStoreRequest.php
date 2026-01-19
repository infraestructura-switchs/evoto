<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EncuestaStoreRequest extends FormRequest
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
     public function rules()
    {
       $rules = [
            'nombre'                   => 'required|max:254',
            'descripcion'              => 'required|max:254',
            'fecha_inicio'             => 'required',
            'fecha_cierre'             => 'required'
        ];
         return $rules;
        
    }
}
