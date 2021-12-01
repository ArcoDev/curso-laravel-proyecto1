<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Obtiene la categoria de la receta vía FK mediante una relacion 
    public function categoria() 
    {
        return $this->belongsTo(CategoriaRecetas::class);
    }
}
