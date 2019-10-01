<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        //reglas de validacion
        //si existe en otra base de datos se pone el nombre de la base exists:pgsl
        return [
            'name'=>'required|min:7',
            'name'=>'required|min:7|max:200',
            'category_id' =>'required|numeric|exists:categories,id',
            'resources'=>'required|array',
            'resources.*'=>'image|mimes:jpeg,png'
        ];
    }
}
