@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-danger mr-2">Volver</a>
@endsection

@section('content')
    <h2 class="text-center m-3">Crear nueva receta</h2>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST"
                  action="{{ route('recetas.store') }}"
                  enctype="multipart/form-data"
                   novalidate
            >
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
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                    {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
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
                    <label for="preparacion">Preparación</label>
                    <input id="preparacion"
                           type="hidden"
                           name="preparacion"
                           value="{{ old('preparacion') }}">
                    <trix-editor
                        class="form-control @error('preparacion') is-invalid @enderror"
                        input="preparacion">
                    </trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input id="ingredientes"
                           type="hidden"
                           name="ingredientes"
                           value="{{ old('ingredientes') }}">
                    <trix-editor
                        class="form-control @error('ingredientes') is-invalid @enderror"
                        input="ingredientes">
                    </trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="imagen">Eligue una imagen</label>
                    <input id="imagen"
                           type="file"
                           class="form-control @error('ingredientes') is-invalid @enderror"
                           name="imagen"
                    >
                    @error('imagen')
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" defer></script>
@endsection
