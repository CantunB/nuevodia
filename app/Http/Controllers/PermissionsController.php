<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_permisos')->only(['create','store']);
        $this->middleware('role_or_permission:read_permisos')->only(['index','show']);
        $this->middleware('role_or_permission:update_permisos')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_permisos')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permisos = Permission::all();
        if ($request->ajax()) {
            $users = User::all();
            return DataTables::of($users)
                ->addIndexColumn()
                ->editColumn('nombre', function ($user){
                    return $user->nombre .' '. $user->paterno .' '. $user->materno;
                })
                ->addColumn('rol', function ($user){
                    return '<span class="badge badge-blue"> '.$user->getRoleNames()->first().' </span>';
                })
                ->addColumn('action', function ($user) {
                    $actions = '';
                    $auth = Auth::user();
                    if ($auth->can('read_permisos')) {
                        return $actions .= '<a href="'. route('permisos.edit',$user->id ) .'"
                           class="waves-effect waves-light action-icon icon-dual-warning">
                            <i class="mdi mdi-alert-rhombus-outline"></i></a>';
                    }
                    return $actions;
                })
                ->rawColumns(['rol','action'])
                ->make(true);
        }
        return view('administrador.permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('administrador.permisos.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permisos = new Permission();
        foreach ($request->name as $item=>$v) {
            $data2=array(
                'name' => $request->name[$item],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            );
            Permission::insert($data2);
        }
        return redirect()->route('admin.index')->with('status_success','Permiso(s) Creado(s)');
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
        $user=  User::findOrFail($id);
        $permisos = Permission::all();
        return view('administrador.permisos.edit', compact('user','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $request->all();
        $user = User::findOrFail($id);
        $user->syncPermissions($request->get('permission'));

        return redirect()->route('permisos.index')->with('status_update','Permisos Asignados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->back()->with('status_info','ELIMINADO CORRECTAMENTE');
    }
}
