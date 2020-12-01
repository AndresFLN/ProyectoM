<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Elemento;

class ElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Elemento::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                   /* ->addColumn('action', function($row){
                            
                          // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_ele.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editElem"><i class="fas fa-edit"></i></a>';//
                           //$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_ele.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteElem"><i class="fas fa-window-close"></i></a>';
                            return $btn;
                    })*/
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('elemento');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

Elemento::updateOrCreate(['Id_ele' => $request->Id_ele],
['Marca_ele' => $request->Marca_ele,
 'Valoracion_ele' => $request->Valoracion_ele,
 'Estado_ele' => $request->Estado_ele,
 'Tipo_ele' => $request->Tipo_ele,]);
        
        return response()->json(['success'=>'Elemento saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /*  public function edit($id)
    {
        $elemento = Elemento::find($id);
        return response()->json($elemento);
    }
    */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
       Elemento::find($id)->delete();
     
       return response()->json(['success'=>'Elemento deleted successfully.']);
    }*/
}