@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
    <div class="card-header bg-primary text-white">
        Lista de categorias
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">AGREGAR</a>
        <hr/>
        {!!Form::open(['method'=>'GET','route'=>'categories.index'])!!}
            {!!Form::text('filter',request()->get('filter'),['class'=>'form-control','placeholder'=>'Buscar nombre de categoria'])!!}
        {!!Form::close()!!}
        
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>ACCIONES</th>
            </tr>
            @forelse($usuarios as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                {!!Form::open(['route'=>['usuarios.destroy',$user],'method'=>'DELETE',
                               'onsubmit'=>'return confirm("Estas seguro que quieres eliminar")'])!!}
                <a href="{{route('usuarios.edit',$user)}}">EDITAR</a>
                {!! Form::submit('ELIMINAR',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
                </td>
            </tr>
            @empty
            <tr> <td colspan="4">No hay registros</td></tr>
            @endforelse
        </table>
        {!! $usuarios->render()!!}
    </div>
    </div>
</div>

@endsection