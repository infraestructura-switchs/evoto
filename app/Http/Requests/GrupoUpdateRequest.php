<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoUpdateRequest extends FormRequest
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
            'nombre'                   => 'required|max:254|unique:grupos,nombre,'. $this->grupo,
            'descripcion'              => 'required|max:254'
        ];
         return $rules;
    }
}
