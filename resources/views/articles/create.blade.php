@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
    <div class="card-header bg-danger text-white">
        Agregar articulos
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        {!! Form::Open(['route'=>'articles.store','files'=>true]) !!}
            {!! Field::text('name', null,['label'=>'Nombre']) !!}
            {!! Field::textarea('description', null,['label'=>'Descripcion','rows'=>4]) !!}
            {!! Field::select('category_id',$categories,null,['label'=>'Categoria',
                                                               'empty'=>'-SELECCIONE-']) !!}
             {!! Field::file('resources',['multiple'=>'true','label'=>'Recursos/Imagenes','accept'=>'image/*']) !!}
             {!! Form::submit('GUARDAR',['class'=>'btn btn-primary btn-block']) !!}
        {!! Form::Close() !!}
    </div>
    </div>
</div>

@endsection