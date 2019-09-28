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
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>SLUG</th>
                <th>ACCIONES</th>
            </tr>
            @forelse($categories as $category)
            <tr>
                <th>{{$category->id}}</th>
                <th>{{$category->name}}</th>
                <th>{{$category->slug}}</th>
                <th></th>
            </tr>
            @empty
            <tr> <td colspan="4">No hay registros</td></tr>
            @endforelse
        </table>
        {!! $categories->render()!!}
    </div>
    </div>
</div>

@endsection