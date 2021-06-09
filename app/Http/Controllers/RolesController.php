<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_roles')->only(['create','store']);
        $this->middleware('role_or_permission:read_roles')->only(['index','show']);
        $this->middleware('role_or_permission:update_roles')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_roles')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $roles = Role::all();
            return DataTables::of($roles)
            ->addIndexColumn()
            ->editColumn('name', function($roles){
                return '<strong style="text-transform: uppercase;">'.$roles->name.'</strong>';
            })
            ->addColumn('usuarios', function($roles){
                return $roles = RoleUser::where('role_id',$roles->id)->count();
            })
            ->addColumn('permisos', function($roles){
                return $permisos = RolePermission::where('role_id',$roles->id)->count();
            })
            ->addColumn('opciones', function ($roles){
                $opciones = '';
                if (Auth::user()->can('read_roles')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                }
                if (Auth::user()->can('read_roles')){
                    //$opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones .= '<a href="'.route('roles.edit',$roles->id).'" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                }
                return $opciones;
            })
            ->rawColumns(['name','opciones'])
            ->toJson();
        }
       // return view('administrador.roles.index', compact('roles'));
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
        Role::create($request->all());
        return redirect()->route('admin.index')->with('status_success', 'ROLE CREADO CORRECTAMENTE');
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
        $roles = Role::findOrFail($id);
        $permisos = Permission::all();
        return view('administrador.roles.edit', compact('roles', 'permisos'));
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
           //return $request->all();
            $role = Role::findByName($request->rolname);
          //  $role->syncPermissions($request->permission);
           $role->syncPermissions($request->permission);
            //role->syncPermissions($request->permission);
        //   $role = Role::findOrFail($id)->permissions()->sync($request->permission);
      //  $role = Role::findOrFail($id)->syncPermissions($request->get('permissions'));
       // $role->update($request->all());
       // $role->syncPermissions->sync($request->permission);
     //   $role->syncPermissions($request->permission);

        return redirect()->route('admin.index')->with('status_info','Role actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->back()->with('status_info','ELIMINADO CORRECTAMENTE');
    }
}
