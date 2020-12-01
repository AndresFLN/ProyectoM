<?php
namespace App\Http\Controllers;

use App\Exports\Ingresos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use App\Ingreso;
use App\Elemento;
use App\Vehiculo;
use App\Visitante;
use App\Usuario;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fecha = Carbon::now();
        $ingresos = Ingreso::all();
        $visitantes = Visitante::all();
        $elementos = Elemento::all();
        $usuarios = Usuario::all();
        $vehiculos = Vehiculo::all();
        return view('ingreso',compact('ingresos','visitantes','elementos','usuarios','vehiculos','fecha'));
    }

    public function store(Request $request)
    {
        //
        $Ingreso = new Ingreso();
        $Ingreso->Id_vis = $request->Visitante_id;
        $Ingreso->Id_ele = $request->Elemento_id;
        $Ingreso->Id_usu = $request->Usuario_id;
        $Ingreso->Id_veh = $request->Vehiculo_id;
        $Ingreso->Fecha_y_hora_de_entrada = Carbon::now();
        $Ingreso->save();

        return redirect('ingresos');
    }
    public function ExportarExcel(){
        return Excel::download(new Ingresos, 'Ingreso.xlsx');
    }








}
