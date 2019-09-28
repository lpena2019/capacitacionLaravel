<?php
namespace App\Core\Facades;

class AlertCustom{
    public function success($msg){
        //Uso de session flash para mostrar alertas
        session()->flash('success',$msg);
        //variable persistente
        //session()->put('success',$msg);
    }
    public function error($msg){
        //Uso de session flash para mostrar alertas
        session()->flash('error',$msg);
    }
}