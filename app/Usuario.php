<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";
  protected $primaryKey = "Id_usu";
  public $timestamps = false;

    protected $fillable = [
        'Id_rol','Nombre_usu', 'Apellido_usu','Identificacion_usu', 'Telefono_usu', 'Correo_usu', 'Contrasena'
    ];
}

