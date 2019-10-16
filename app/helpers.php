<?php
function saveFile($namefile,$objFile){
    //namefile  nombre del archivo
    //objFile -> contenido del archivo
 //   \Storage::disk('public')->put($namefile,\File::get($objFile));

 //disco en el cual deseo guardar
   \Storage::disk('sftp')->put('/photos-articles/',\File::get($objFile));
}

function currentUser(){
    return auth()->user();
}
