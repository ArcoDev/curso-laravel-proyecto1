@extends('layouts.app');

@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-primary mt-2 mr-2">Crear recetas</a>
@endsection

@section('content')
<h2 class="text-center m-3">Recetas</h2>
<div class="col-md-10 mx-auto bg-white pb-3">
    <table class="table">
        <thead class="bg-danger text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Categorías</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pizza</td>
                <td>Pizzas</td>
                <td>

                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
