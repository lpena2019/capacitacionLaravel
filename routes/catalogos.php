<?php
//llamada de bloque de procesos
//Rutas de tipo recurso para controlador create, insert, delete, update
//debe llamar siempre a un controlador para importar a un controlador el mismo que se crea a nivel de comandos
Route::resource('categories', 'Catalogos\CategoryController');
Route::resource('articles', 'Catalogos\ArticleController');
