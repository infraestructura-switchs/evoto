<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AspiranteUpdateRequest extends FormRequest
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
       return [
            
            'nombre'                   => 'required',
            'apellido'                 => 'required',
            'documento'                => 'required|unique:candidatos,documento,'. $this->aspirante,
            'email'                    => 'required|unique:candidatos,email,'  . $this->aspirante,  
            'lugar_expedicion'         => 'required',        
            'telefono'                => 'required',
            'programa'                => 'required',
            'semestre'                => 'required',
            'foto'                    => 'mimes:jpg,jpeg,png'
          
            
        ];
    }
}
