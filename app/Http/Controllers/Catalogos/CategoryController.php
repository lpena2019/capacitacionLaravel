<?php

namespace App\Http\Controllers\Catalogos;

use App\Core\Elonquent\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //funcion global dentro del proyecto helper dd
        //dd(request());  //presenta un objeto y mata el proceso llama al helper request
        //request -> indica la ruta que se esta ejecutando
        //return "Hola mundo";
        //return view('categories.index');
        //select * from retorna coleccion de objetos del tipo category 
        //las categorias es el modelom definido en el modelo de objetos
        //$categories=Category::all();

        //paginar modelo
        $categories=Category::paginate(2);  //15 registros por pantalla
        //compact-> mantiene el nombre
        //with-> extrae nombre de variable, renombra
        return view('categories.index', compact('categories'));
//caso 2
        //$categories=Category::all();
        //return view('categories.index')-> with(['categories'=>$categories]);
//caso 3
        //return view('categories.index', with(['categories'=>Category::all()]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //imprimir la peticion request que viene del navegador
        //dd(request());

        //indicamos que retornamos una vista
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Elonquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Elonquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Elonquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Elonquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
