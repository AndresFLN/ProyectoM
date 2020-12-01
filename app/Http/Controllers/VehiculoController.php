<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Vehiculo;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vehiculo::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    /*->addColumn('action', function($row){
                            
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_veh.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editVehi"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_veh.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteVehi"><i class="fas fa-window-close"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])*/
                    ->make(true);
        }
      
        return view('vehiculo');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

        Vehiculo::updateOrCreate(['Id_veh' => $request->Id_veh],
        ['Nombre_con' => $request->Nombre_con,
         'Apellido_con' => $request->Apellido_con,
         'Identificacion_con' => $request->Identificacion_con,
         'Telefono_con' => $request->Telefono_con,
         'Razon_de_entrada_con' => $request->Razon_de_entrada_con,
         'Placas' => $request->Placas,
         'Tipo_veh' => $request->Tipo_veh,
         'Estado_veh' => $request->Estado_veh,]);
        
        return response()->json(['success'=>'Vehiculo saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return response()->json($vehiculo);
    }*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
       Vehiculo::find($id)->delete();
     
       return response()->json(['success'=>'Vehiculo deleted successfully.']);
    }*/
}