<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //desde aqui se manejan los Roles y autorizaciones de usuario
        return true;  //true da acceso si es false no te permite seguir
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Van todas las reglas de validacion
        return [
            'name'=> 'required|min:6|max:15',
            'description'=>'required|max:40',
        ];
    }

    public function attributes(){
        return[
            'name'=>'nombre',
            'description'=>'descripcion'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Debe ingresar el nombre',
            'description.required'=>'Debe ingresar la descripcion'
        ];
    }
}
