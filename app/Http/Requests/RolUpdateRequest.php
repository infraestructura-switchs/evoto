<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolUpdateRequest extends FormRequest
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
            'nombre'                   => 'required|max:255|unique:roles,nombre,'. $this->role,
            'descripcion'              => 'required|max:255'
        ];
         return $rules;
    }
}
