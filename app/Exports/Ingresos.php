<?php

namespace App\Exports;

use App\Elemento;
use App\Ingreso;
use App\Usuario;
use App\Vehiculo;
use App\Visitante;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Ingresos implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
    public function View(): View{
        $ingresos = Ingreso::all();
        $visitantes = Visitante::all();
        $elementos = Elemento::all();
        $usuarios = Usuario::all();
        $vehiculos = Vehiculo::all();
        return view('Exportaciones.Ingresos',compact('ingresos','visitantes','elementos','usuarios','vehiculos'));
    }
}
