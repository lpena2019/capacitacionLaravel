<?php

namespace App\Core\Elonquent;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name','vpath','article_id'];
    public function articles() {
        //hasOne especifica en este caso que un usuario solo puede tener una sola transferencia, 
        //belongsTo sirve para definir el inverso de una relación.
        //Ya que el usuario es quien hace la transferencia debes de utilizar belongsTo en el modelo transferencia para obtener el usuario que la realizó.
        return $this->belongsTo(Article::class, 'article_id','id'); //retorna un modelo
    }

    public function assign($uploadedFiles){
        $arrResources = [];
        foreach ($uploadedFiles as $key =>$file){
            $nameFile = 'IMG'.uniqid().'.'.$file->getClientOriginalExtension();
            saveFile($nameFile,$file);
            $arrResources[]=new Resource(['name'=>$nameFile,
            'vpath'=>'/photos-articles/']);
        }
        return $arrResources;
    }

}
