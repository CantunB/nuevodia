<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empresas\UpdateEnterpriseRequest;
use App\Models\District;
use App\Models\Enterprise;
use App\Models\EnterpriseEmployee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class EnterpriseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
=======
        $this->middleware('role_or_permission:create_empresas')->only(['create','store']);
        $this->middleware('role_or_permission:read_empresas')->only(['index','show']);
        $this->middleware('role_or_permission:update_empresas')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_empresas')->only(['destroy']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $usuarios = User::where('estatus','2')->get();
      //  $usuarios->hasRole('empresas');
        if ($request->ajax()){
            $enterprise = Enterprise::all();
            return DataTables::of($enterprise)
                ->addIndexColumn()
                ->addColumn('no_employee', function($enterprise){
                    return $enterprise->Enterprise_Employee()->count();
                })
                ->addColumn('opciones', function ($enterprise){
                    $opciones = '';
                    if (Auth::user()->can('read_empresas')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    }
                    if (Auth::user()->can('update_empresas')){
                        $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                    }
                    /*if (Auth::user()->can('delete_empresas')){
                        $opciones  .= '<button onclick="deleteConfirmationEnterprise('.$enterprise->id.')"
                        data-id=" '.$enterprise->id.' "
                        type="button"
                        class="btn btn-sm- action-icon icon-dual-danger">
                        <i class="mdi mdi-trash-can"></i></button>';
                    }*/
                    if (Auth::user()->can('read_empleados')){
                        $opciones  .= '<a href="'.route('Empresas.show', $enterprise->id).'" class="btn btn-sm action-icon icon-dual-primary"><i class="mdi mdi-file-table-outline"></i></a>';
                    }

                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }
        return view('empresas.empresas.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $empresa = Enterprise::create($request->all());
        //$simpatizante->update($request->all());

          $empresa->Enterprise_User()->sync([
                $empresa->id =>[
                    'user_id' => $request->user_id,
                ]
            ]);
<<<<<<< HEAD

        if ($empresa == true){
=======
        return redirect()->route('Empresas.index')->with('status_success','EMPRESA REGISTRADA CORRECTAMENTE');
       /* if ($empresa == true){
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            $success = true;
            $message = "Registro actualizado correctamente";
        } else {
            $success = true;
            $message = "Registro no actualizado";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
<<<<<<< HEAD
        ]);
=======
        ]);*/
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $empresa_id = $id;
        $distritos = District::all();
        $empresas = Enterprise::all();
        //$empresa = EnterpriseEmployee::with(['getEnterprise','getEmployee'])->where('enterprise_id',$id)->get();
        if ($request->ajax()){
            $empresa_data = EnterpriseEmployee::with(['getEnterprise','getEmployee'])->where('enterprise_id',$id);

            return DataTables::of($empresa_data)
                ->addIndexColumn()
                ->addColumn('empresa', function($empresa_data){
                    return $empresa_data->getEnterprise->name;
                })
                ->addColumn('empleado', function($empresa_data){
                    return $empresa_data->getEmployee->nombre .' '. $empresa_data->getEmployee->paterno .' '. $empresa_data->getEmployee->materno;
                })
<<<<<<< HEAD
=======
                ->addColumn('direccion', function($empresa_data){
                    return 'Calle' . $empresa_data->getEmployee->calle
                        .' '. $empresa_data->getEmployee->cruzamiento
                        .' '. $empresa_data->getEmployee->no_ext
                        .' '. $empresa_data->getEmployee->no_int
                        .' '. $empresa_data->getEmployee->colonia
                        .' '. $empresa_data->getEmployee->cp;
                })
                ->addColumn('distrito', function($empresa_data){
                    return $empresa_data->getEmployee->distrito;
                })
                ->addColumn('seccion', function($empresa_data){
                    return $empresa_data->getEmployee->seccion;
                })
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                ->addColumn('opciones', function ($empresa_data){
                    $opciones = '';
                    if($empresa_data->getEmployee->employee_ine){
                        $opciones .= '<a target="_blank" href=" '.asset($empresa_data->getEmployee->employee_ine).'" class="btn btn-sm getInfo action-icon icon-dual-success"><i class="mdi mdi-badge-account-horizontal-outline"></i></a>';
                    }
                 //   if (Auth::user()->can('read_lideres')){
                  //  }
                    //if (Auth::user()->can('read_movilizadores')){
                    //    $opciones .= '<a href=" '. route('Mobilizers.show',$lideres->leader_id) .' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                   // }
                  //  if (Auth::user()->can('update_lideres')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';

                 //   }
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }

        return view('empresas.empresas.show', compact('empresa_id','empresas','distritos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnterpriseRequest  $request, $id)
    {
        $empresa = Enterprise::findOrFail($id);
        $empresa->update($request->all());
        if ($empresa == true){
            $success = true;
            $message = "Registro actualizado correctamente";
        } else {
            $success = true;
            $message = "Registro no actualizado";
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Enterprise::findOrFail($id)->delete();
        if ($delete == 1){
            $success = true;
            $message = "Empresa eliminada correctamente";
        } else {
            $success = true;
            $message = "Fallo el proceso";
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);

    }
}
