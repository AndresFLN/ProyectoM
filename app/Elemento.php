<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = "elemento";
    protected $primaryKey = "Id_ele";
    public $timestamps = false;
     protected $fillable = [
        'Marca_ele','Valoracion_ele','Estado_ele','Tipo_ele'
    ];
}