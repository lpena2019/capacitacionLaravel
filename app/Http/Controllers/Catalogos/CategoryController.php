<?php

namespace App\Http\Controllers\Catalogos;

use App\Core\Elonquent\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Facades\App\Core\Facades\AlertCustom;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //esto debe de llenar una variable de sesion
       // AlertCustom::success('inicio');
        //funcion global dentro del proyecto helper dd
        //dd(request());  //presenta un objeto y mata el proceso llama al helper request
        //request -> indica la ruta que se esta ejecutando
        //return "Hola mundo";
        //return view('categories.index');
        //select * from retorna coleccion de objetos del tipo category 
        //las categorias es el modelom definido en el modelo de objetos
        //$categories=Category::all();

        //paginar modelo
        //$categories=Category::paginate(10);  //15 registros por pantalla
        //compact-> mantiene el nombre
        //with-> extrae nombre de variable, renombra
        
//caso 2
        //$categories=Category::all();
        //return view('categories.index')-> with(['categories'=>$categories]);
//caso 3
        //return view('categories.index', with(['categories'=>Category::all()]));


        $categories=Category::where('name','ILIKE',"%".request()->get('filter')."%")->paginate(3);
        return view('categories.index', compact('categories'));

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
    public function store(CategoryRequest $request)
    {
        //dd($request);
        //Asignacion masiva debe ser igual a la caja de texto al valor del atributo de la base de datos
        //acepte todo lo que venga del formulario hace machin con fillable y lo guarde al modelo de  base de datos
        //primera forma de guardar
     //   Category::create($request->all());
        // todo lo que venga del formulario solo se acepta los definidos en only para guardar en el modelo
        ///Segunda forma de guarda
        //Category::create($request->only(['name','descrption'])); 
        
        //Solo lo que paso la validacion asignale y guardalo en la base de datos
        Category::create($request->validated()); 

        AlertCustom::success('Guardado correcatamente');
        //una vez guardado redireccionar al index
        return redirect()->route('categories.index');
        //return view('categories.index');
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
        //ES un formulario
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Elonquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //Una accion que va hacer un proceso y se direcciona al index
        $category->fill($request->validated());
        $category->save();
        AlertCustom::success('Actualizado correctamente');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Elonquent\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //eliminacion
        $category->delete();
        AlertCustom::success('Eliminado correctamente');
        return redirect()->route('categories.index');

    }
}
