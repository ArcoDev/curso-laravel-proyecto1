@extends('layouts.app');

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-danger mt-2 mr-2">Volver</a>
@endsection

@section('content')
    <h2 class="text-center m-3">Crear nueva receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{ route('recetas.store') }}" novalidate>
                @csrf
                <!--Se agrega el token de seguridad en todos los formularios para permitir el request dentro de los mismos, ya que laravel lo trae integrado  como seguridad -->
                <div class="form-group">
                    <label for="titulo">Titulo Recetas</label>
                    <input type="text"
                           name="titulo"
                           id="titulo"
                           class="form-control @error('titulo') is-invalid @enderror "
                           placeholder="Titulo Receta"
                           value={{ old('titulo') }}
                    >
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categorías</label>
                    <select name="categoria"
                            class="form-control @error('categoria') is-invalid @enderror"
                            id="categoria">
                        <option value="">-- Seleccina una opcion --</option>
                        @foreach ($categorias as $id => $categoria)
                            <option value="{{ $id }}"
                                    {{ old('categoria') == $id ? 'selected' : '' }}>
                                    {{ $categoria }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-danger" value="Agregar Receta">
                </div>
            </form>  
        </div>
    </div>
@endsection
