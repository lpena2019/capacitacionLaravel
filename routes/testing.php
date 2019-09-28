<?php

//se alimenta de un array y de un callback
Route::group( ['prefix'=>'admin'],function(){

    Route::get('/saludar-p/{name}', function($name){
        return "Hola ".$name;
    });

    Route::get('/saludar-d/{name?}', function($name="vacio"){
        return "Hola ".$name;
    });
    Route::get('/sumar/{op1}/{op2?}', function($op1, $op2=1){
        return $op1+$op2;
    });

    Route::get('validador/{num}', function($num){
        return $num;
    })->where(['num'=>'[0-9]+']);

    Route::get('validador/{num1}/{num2}', function($num1,$num2){
        return $num1 + $num2;
    })->where(['num1'=>'[0-9]+',
              'num2'=>'[0-9]+']);
});
