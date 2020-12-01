<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Novedad;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Novedad::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                   /* ->addColumn('action', function($row){
                            
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_nov.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editNove"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_nov.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteNove"><i class="fas fa-window-close"></i></a>';
                            return $btn;
                    })*/
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('novedad');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

Novedad::updateOrCreate(['Id_nov' => $request->Id_nov],
['Id_usu' => $request->Id_usu,
'Id_ing' => $request->Id_ing,
'Tipo_nov' => $request->Tipo_nov,
 'Descripcion_nov' => $request->Descripcion_nov,
 'Responsable' => $request->Responsable,]);
        
        return response()->json(['success'=>'Novedad saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $novedad = Novedad::find($id);
        return response()->json($novedad);
    }*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
       Novedad::find($id)->delete();
     
       return response()->json(['success'=>'Novedad deleted successfully.']);
    }*/
}