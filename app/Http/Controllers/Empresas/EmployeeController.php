<?php

namespace App\Http\Controllers\Empresas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empleados\StoreEmployeeRequest;
use App\Http\Requests\Empleados\UpdateEmployeeRequest;
use App\Models\District;
use App\Models\Employee;
use App\Models\Enterprise;
use App\Models\EnterpriseEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
=======
        $this->middleware('role_or_permission:create_empleados')->only(['create','store']);
        $this->middleware('role_or_permission:read_empleados')->only(['index','show']);
        $this->middleware('role_or_permission:update_empleados')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_empleados')->only(['destroy']);
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresas = Enterprise::all();
        $distritos = District::all();
        if ($request->ajax()){
<<<<<<< HEAD
            $empleado = EnterpriseEmployee::with(['getEnterprise','getEmployee'])->get();
=======
            $empleado = EnterpriseEmployee::with(['getEnterprise','getEmployee'])
            ->whereHas('getEmployee', function($q) {
                $q->where('status','1');
            });
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
            return DataTables::of($empleado)
                ->addIndexColumn()
                ->addColumn('empresa', function ($empleado){
                    return $empleado->getEnterprise->name;
                })
                ->addColumn('empleado', function ($empleado){
                    return $empleado->getEmployee->nombre .' '. $empleado->getEmployee->paterno .' '.$empleado->getEmployee->materno;
                })
<<<<<<< HEAD
=======
                ->filterColumn('empleado', function($query, $keyword) {
                    $query->whereHas('getEmployee', function($query) use ($keyword) {
                     //   $query->whereRaw("CONCAT(nombre, paterno, materno) like ?", ["%{$keyword}%"]);
                        $query->whereRaw("CONCAT(COALESCE(`nombre`,''), COALESCE(`paterno`,''), COALESCE(`materno`,'')) like ?", ["%{$keyword}%"]);
                    });
                })
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                ->addColumn('address', function($empleado){
                    return  $empleado->getEmployee->colonia     .' '.
                            $empleado->getEmployee->cruzamiento .' '.
                            $empleado->getEmployee->no_ext      .' '.
                            $empleado->getEmployee->no_int      .' '.
                            $empleado->getEmployee->colonia     .' '.
                            $empleado->getEmployee->cp;
                })
<<<<<<< HEAD
                ->addColumn('opciones', function ($enterprise){
                    $opciones = '';
                    if (Auth::user()->can('read_empleados')){
                        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                    }
                    //if (Auth::user()->can('read_movilizadores')){
                    //    $opciones .= '<a href=" '. route('Mobilizers.show',$lideres->leader_id) .' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                   // }
                    if (Auth::user()->can('update_empleados')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                        $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
=======
                ->addColumn('seccion', function($empleado){
                    return  $empleado->getEmployee->seccion;
                })->addColumn('distrito', function($empleado){
                    return  $empleado->getEmployee->distrito;
                })
                ->addColumn('opciones', function ($empleado){
                    $opciones = '';
                //    if (Auth::user()->can('read_empleados')){
                //        $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                //    }
                    //if (Auth::user()->can('read_movilizadores')){
                    //    $opciones .= '<a href=" '. route('Mobilizers.show',$lideres->leader_id) .' " class="action-icon icon-dual-success"><i class="mdi mdi-account-group"></i></a>';
                   // }
                  //  if (Auth::user()->can('update_empleados')){
                    //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                  //      $opciones  .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                  //  }
                    if (Auth::user()->can('update_empleados')){
                        //   $opciones  .= '<a href=" '. route('Leaders.edit',$lideres->leader_id) .' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                        $opciones  .= '<button type="button" class="btn btn-sm action-icon voto icon-dual-success"><i class="mdi mdi-account-box-outline"></i></button>';
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    }
                    return $opciones;
                })
            ->rawColumns(['opciones'])
            ->toJson();
        }
        return view('empresas.empleados.index', compact('empresas','distritos'));
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
    public function store(StoreEmployeeRequest $request)
    {
      //  return $request->all();
        $empleado = Employee::create($request->all());
        //$simpatizante->update($request->all());
      /* if ($request->hasFile('employee_ine')) {
            $file = $request->file('employee_ine');
            $filename = $request->clave_elector .'.'.$file->getClientOriginalExtension();
            $path = public_path('images/empleados/' . $filename);
//            Image::make($file)->resize(150,150)->save(public_path('/images/empleados/'. $filename) );
            Image::make($file->getRealPath())->resize(150,150)->save($path);
            // $user->update($request->all());
            $empleado->employee_ine = 'images/empleados/'.$filename;
            $empleado->save();
        }*/
        if ($request->hasFile('employee_ine')) {
            $file = $request->file('employee_ine');
            $filename = $request->clave_elector .'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/empleados'), $filename);
            $empleado->employee_ine = 'images/empleados/'.$filename;
            $empleado->save();
        }

<<<<<<< HEAD


          $empleado->Employee_Enterprise()->sync([
=======
        $empleado->Employee_Enterprise()->sync([
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                $empleado->id =>[
                    'enterprise_id' => $request->enterprise_id,
                    'user_id' => $request->user_id
                ]
            ]);
<<<<<<< HEAD

        if ($empleado == true){
=======
        return redirect()->route('Empleados.index')->with('status_success','EMPLEADO REGISTRADO CORRECTAMENTE');

      /*  if ($empleado == true){
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
        ], 200);
=======
        ], 200); */
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $empleados = Employee::findOrFail($id);
        $empleados->update($request->all());
        if ($request->hasFile('employee_ine')) {
            $file = $request->file('employee_ine');
            $filename = $request->clave_elector .'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/empleados'), $filename);
            $empleados->employee_ine = 'images/empleados/'.$filename;
            $empleados->save();
        }
<<<<<<< HEAD
=======
        if ($request->hasFile('employee_boleta')) {
            $file = $request->file('employee_boleta');
            $filename = $request->clave_elector .'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/empleados/votos'), $filename);
            $empleados->employee_boleta = 'images/empleados/votos/'.$filename;
            $empleados->status = 2;
            $empleados->save();
        }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)

        /*if ($request->hasFile('employee_ine')) {
            $file = $request->file('employee_ine');
            $filename = $request->clave_elector .'.'.$file->getClientOriginalExtension();
            $path = public_path('images/empleados/' . $filename);
//            Image::make($file)->resize(150,150)->save(public_path('/images/empleados/'. $filename) );
            Image::make($file->getRealPath())->resize(150,150)->save($path);
            // $user->update($request->all());
            $empleados->employee_ine = 'images/empleados/'.$filename;
            $empleados->save();
        }*/
        if ($empleados == true){
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
        //
    }
}
