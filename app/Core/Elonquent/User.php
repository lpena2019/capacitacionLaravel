<?php

namespace App\Core\Elonquent;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class User extends Model
{
   
    use softDeletes;

    protected $table = "users";
    protected $conection = "";

    protected $fillable=['name', 'email', 'passworld'];

 /*   public static function boot(){
        static::creating(function($model){
            $model->name=Str::slug($model->name);
            $model->email=1;
            $model->password=1;
        });

        static::updating(function($model){
        $model->updated_user=1;
        });
        parent::boot();
    }

     public function getNameAttribute($value){
           return Str::upper($value); 
    }
*/
       public function setNameAttribute($value){
        $this->attributes['name']=Str::upper($value);
    }
    public function setPasswordAttribute($value){
        $this->attribute[‘password’]=bcrypt($value);
    }
        
}
