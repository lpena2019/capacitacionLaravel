@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
    <div class="card-header bg-danger text-white">
        Edicion
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">REGRESAR</a>

{!! Form::open(['route'=>['usuarios.update', $user],'method'=>'PUT']) !!}

    {!! Field::text('name', $user->name, ['label'=>'Nombre','placeholder'=>'Ingrese el nombre']) !!}
    {!! Field::text('email', $user->email, ['label'=>'Email','placeholder'=>'Ingrese el email']) !!}
    {!! Field::text('password', $user->password, ['label'=>'Clave','placeholder'=>'Ingrese la clave]) !!}
   
    {!!Form::submit('GUARDAR',['class'=>'btn btn-primary'])!!}

{!! Form::close() !!}
    </div>
    </div>
</div>

@endsection