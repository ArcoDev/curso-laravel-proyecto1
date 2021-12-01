@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-danger mt-2 mr-2">Crear recetas</a>
@endsection

@section('content')
<h2 class="text-center m-3">Administra tus recetas</h2>
<div class="col-md-10 mx-auto bg-white pb-3">
    <table class="table border">
        <thead class="bg-danger text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categorías</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recetas as $receta)
                <tr>
                    <td> {{$receta->titulo}} </td>
                    <td> {{$receta->categoria_id}} </td>
                    <td> 
                        <a href="" class="btn btn-danger mr-1">Eliminar</a>
                        <a href="" class="btn btn-dark mr-1">Editar</a>
                        <a href="" class="btn btn-success mr-1">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
