<?php

namespace App\Http\Controllers\Catalogos;

use App\Core\Elonquent\{Article,Category,Resource};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

use Facades\App\Core\Facades\AlertCustom;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::pluck('name','id')->toArray();
     
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        DB::transaction(function() use ($request){
            $objArticle = Article::create($request->validated());
            $objArticle->resources()->saveMany((new Resource)->assign($request->file('resources')));
        });
        //dd($request);
        //$objArticle = Article::create($request->validated());
        //invocamos a la funcion resources de la clase Resource
        //guardo varios recursos a la vez
        //$objArticle->resources()->saveMany((new Resource)->assign($request->file('resources')));
        
        //retornamos una redireccion
        AlertCustom::success('Guardado correcatamente');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Elonquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Elonquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Elonquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Elonquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
