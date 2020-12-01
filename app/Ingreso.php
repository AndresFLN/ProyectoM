<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = "ingreso";
    protected $primaryKey = "Id_ing";
    public $timestamps = false;
     protected $fillable = [
        'Id_vis','Id_ele','Id_usu','Id_veh','Fecha_y_hora_de_entrada', 'Fecha_y_hora_de_salida'
    ];

    public function visitante(){
        return $this->hasMany('Elemento');
    }
}