<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaRecetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    //Creacion de url's protegidas
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Primera forma para mostrar las recetas que se creo el usuario n
        Auth::user()->recetas->dd(); */

        /* Segunda forma para mostrar las recetas que se creo el usuario n
        auth::user()->recetas->dd(); */

        $recetas = auth()->user()->recetas;

        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Pasando las categorias de la BD a la vista mediantes los metodos
          DB::table('categoria_receta')->get()->pluck('nombre' , 'id')->dd();
          Obtner las categorias sin modelo

        $categorias = DB::table('categoria_recetas')->get()->pluck('nombre' , 'id'); */
        
        /** Con modelo */
        $categorias = CategoriaRecetas::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias);

    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //Almacenar images en el servidor
        //dd($request['imagen']->store('uploads-recetas', 'public'));

        //Creando la validacion con el metodo de validate
        $data = $request->validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
        ]);

        //Optener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('uploads-recetas', 'public');

        //Risize de la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();
        
        /* Insertar un registro en la BD con la clase DB (sin modelo)
        crear un fasat (similar a las funciones)
            DB::table('recetas')->insert([
                'titulo' => $data['titulo'],
                'preparacion' => $data['preparacion'],
                'ingredientes' => $data['ingredientes'],
                'imagen' => $ruta_imagen,
                //agregando el helper para saber que usuario esta autenticado y asi relacionarlo en la BD
                'user_id' => Auth::user()->id,
                'categoria_id' => $data['categoria'],
            ]);
        */

        /*Insertar un registro en la BD con la clase DB (con modelo)*/
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria'],
        ]);
        
        /* dd es similar al var_dump
            dd($request->all());
        */

        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        /* Metodo antiguo para mostrar informacion de la BD
            $receta = Receta::findOrFail($receta); 
        */
        /*Forma actual */
        return view('recetas.show', compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}

/* 
Import-Module -Name Terminal-Icons
Import-Module oh-my-posh
Set-PoshPrompt -Theme iterm2
*/