<?php

namespace App\Core\Elonquent;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function articles() {
        //hasOne especifica en este caso que un usuario solo puede tener una sola transferencia, 
        //belongsTo sirve para definir el inverso de una relación.
        //Ya que el usuario es quien hace la transferencia debes de utilizar belongsTo en el modelo transferencia para obtener el usuario que la realizó.
        return $this->belongsTo(Article::class, 'article_id','id'); //retorna un modelo
    }
}
