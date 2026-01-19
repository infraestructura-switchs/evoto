<?php

namespace diser\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
            'name'          => 'required|max:255',
            'apellido'      => 'required|max:255',
            'documento'     => 'max:255|unique:users,documento',
            'email'         => 'required|email|max:128|confirmed|unique:users,email',
            // 'password'      => 'required|min:6|confirmed',      
        ];
         return $rules;
    }
}
