<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = "novedad";
    protected $primaryKey = "Id_nov";
    public $timestamps = false;
     protected $fillable = [
        'Id_usu','Id_ing','Tipo_nov','Descripcion_nov','Responsable'
    ];
}