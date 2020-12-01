<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculo";
    protected $primaryKey = "Id_veh";
    public $timestamps = false;
     protected $fillable = [
        'Nombre_con','Apellido_con','Identificacion_con','Telefono_con', 'Razon_de_entrada_con','Placas','Tipo_veh','Estado_veh'
    ];
}