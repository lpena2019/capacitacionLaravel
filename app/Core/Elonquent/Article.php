<?php

namespace App\Core\Elonquent;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function resources(){
        //campo por el cual se relacionan
        //extraigo coleccion de objtos del modelo recurso 
        //un articulo va ha tener varios recursos
        //acceso a una coleccion de hijos
        return $rhis->hasMany(Resource::class,'article_id', 'id');

    }
}
