<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = "visitante";
    protected $primaryKey = "Id_vis";
    public $timestamps = false;
     protected $fillable = [
        'Nombre_vis','Apellido_vis','Identificacion_vis','Telefono_vis', 'Razon_de_entrada'
    ];
}
