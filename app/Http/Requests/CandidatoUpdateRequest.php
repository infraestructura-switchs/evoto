<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoUpdateRequest extends FormRequest
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
            'ideleccion'               => 'required',
            'nombre'                   => 'required',
            'apellido'                 => 'required',
            'numero_tarjeton'             => 'required',
            'foto'                    => 'mimes:jpg,jpeg,png'
            
        ];
        // if($this->get('foto'))        
        //     $rules = array_merge($rules, ['foto'         => 'mimes:jpg,jpeg,png']);
        // return $rules;
    }
}
