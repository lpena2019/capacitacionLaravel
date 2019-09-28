<?php

namespace App\Core\Elonquent;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};
//Para trabajar con la clase Str (String)
use Str;

class Category extends Model
{
    //trait esta accion sirve para introducir un codigo que sea generico y que tenga
    // diferentes acciones
    //si va dentro de la clase significa que vas a usar metodos que interactuen con la clase
    //para eliminacion logica
    use softDeletes;

    protected $table = "categories";
    protected $conection = "";

    //variable de asignacion masiva
    //fillable cuando extraigo objeto de la bd muestr informacion
    // $hidden traigo de la base y quiero ocultarlos
    // casts tratar a ese datos como un objeto diferente
    protected $fillable=['name', 'description'];

    public static function boot(){
        //realizar una accion determinada
        //Inserta en la base de datos
        static::creating(function($model){
            $model->slug=Str::slug($model->name);
            $model->created_user=1;
            $model->updated_user=1;
        });

        static::updating(function($model){
        $model->updated_user=1;
        });
        parent::boot();
    }

    //Desde aqui le podemos dar formato a los registros de base de datos
    //sessor es el metodo get, nombre del atributo de la bd (Valor del objeto)
    //y retorna el valor 
    //si tiene _ el nombre del atributo debe ir getFirstNameAttibute
    //trae el dato y lo transforma
    public function getNameAttribute($value){
        //return $value.'proceso';
        return Str::upper($value); 
    }

    //mutator al atributo name confiertelo en este formato
    //transforma y guarda
    //transforma el dato y luego lo guarda
    public function setNameAttribute($value){
        $this->attributes['name']=Str::upper($value);
    }
}
