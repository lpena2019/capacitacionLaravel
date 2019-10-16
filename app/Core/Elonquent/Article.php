<?php

namespace App\Core\Elonquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable; 
    public function resources(){
        //campo por el cual se relacionan
        //extraigo coleccion de objtos del modelo recurso 
        //un articulo va ha tener varios recursos
        //acceso a una coleccion de hijos
        return $his->hasMany(Resource::class,'article_id', 'id');
    }

    //objetos de campos de asignacion masiva 
    protected $fillable = ['name','description','category_id'];

    public function sluggable()
    {   //inserta campo slug
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function boot(){
        //realizar una accion determinada
        //Inserta en la base de datos
        static::creating(function($model){
            $model->created_user=1;
            $model->updated_user=1;
        });

        static::updating(function($model){
        $model->updated_user=1;
        });
        parent::boot();
    }
}
