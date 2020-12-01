<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Maatwebsite\Excel\Facades\Excel;
use App\Visitante;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Visitante::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    /*->addColumn('action', function($row){
                            
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_vis.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editVisi"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_vis.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteVisi"><i class="fas fa-window-close"></i></a>';
                            return $btn;
                    })*/
                    //->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('visitante');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

       /* $request->validate([
            'Id_vis' => 'unique:visitante|required',
            'Nombre_vis' => 'required',
            'Apellido_vis' => 'required',
            'Identificacion_vis' => 'unique:visitante|numeric|required',
            'Telefono_vis' => 'unique:empleados|numeric',
            'Razon_de_entrada' => 'required',
        
        ]);*/
        
        Visitante::updateOrCreate(['Id_vis' => $request->Id_vis],
        ['Nombre_vis' => $request->Nombre_vis,
         'Apellido_vis' => $request->Apellido_vis,
         'Identificacion_vis' => $request->Identificacion_vis,
         'Telefono_vis' => $request->Telefono_vis,
         'Razon_de_entrada' => $request->Razon_de_entrada,
         ]);


        return response()->json(['success'=>'El visitante se guardo correctamente.']);
        
    }

    public function ExportarExcel(){
        return Excel::download(new Visitantes, 'Visitantes.xlsx');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function edit($id)
    {
        $visitante = Visitante::find($id);
        return response()->json($visitante);
    }*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
       Visitante::find($id)->delete();
     
       return response()->json(['success'=>'Visitante deleted successfully.']);
    }*/
}