<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntidadStoreRequest extends FormRequest
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
            'nombre'                   => 'required|unique:entidades,nombre',
            'nit'                      => 'required|unique:entidades,nit',
            'direccion'                => 'required',
            'telefono'                 => 'required',
            'email'                    => 'required'
        ];
        if($this->get('logo'))        
            $rules = array_merge($rules, ['logo'         => 'mimes:jpg,jpeg,png']);
        return $rules;
    }
}
