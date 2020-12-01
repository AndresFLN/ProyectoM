<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Usuario;
use Illuminate\Support\Facades\Crypt;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Usuario::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    /*->addColumn('action', function($row){
                            
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_usu.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUsua"><i class="fas fa-edit"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->Id_usu.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUsua"><i class="fas fa-window-close"></i></a>';
                            return $btn;
                    })*/
                    //->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('usuario');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    

    Usuario::updateOrCreate(['Id_usu' => $request->Id_usu],
    ['Id_rol' => $request->Id_rol,
    'Nombre_usu' => $request->Nombre_usu,
    'Apellido_usu' => $request->Apellido_usu,
    'Identificacion_usu' => $request->Identificacion_usu,
     'Telefono_usu' => $request->Telefono_usu,
    'Correo_usu' => $request->Correo_usu,
    'Contrasena' => Crypt::encrypt($request->Contraseña)]);
        
        return response()->json(['success'=>'Usuario saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function edit($id)
    {
        $usuario = Usuario::find($id);
        return response()->json($usuario);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
       Usuario::find($id)->delete();
     
       return response()->json(['success'=>'Usuario deleted successfully.']);
    }*/
}