<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImagesRule implements Rule
{
    private $nameAttribute;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->nameAttribute=$attribute;
    
        //verifica si nuestro archivo esta o no en u directorio especifico
        $result = true;

        foreach($value as $key => $item){
            // getMimeType Para evaluar tipos de archivos
            if (!in_array($item->getMimeType(),['image/png','image/jpg','image/jpeg'])){
                $result=false;
                break;
            }
        }

        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        //Este mensaje se muestra cuando no paso la validacion
          return 'El campo '.$this->nameAttribute.' solo acepta imagens png /jpg.';
    }
}
