<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Owner;
use App\Models\Simpatizantes;
use App\Models\Sympathizer;
use App\Models\Tocados;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $usuarios = User::orderBy('nombre','ASC')->get();
        $roles = Role::all();
        return view('administrador.usuarios.users',compact('usuarios','roles'));
=======
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_usuarios')->only(['create','store']);
        $this->middleware('role_or_permission:read_usuarios')->only(['index','show']);
        $this->middleware('role_or_permission:update_usuarios')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_usuarios')->only(['destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
            $usuarios = User::all();
            return DataTables::of($usuarios)
            ->addIndexColumn()
            ->addColumn('nombre', function ($usuarios){
                return '<strong style="text-transform: uppercase;">'. $usuarios->nombre .' '. $usuarios->paterno .' '. $usuarios->materno.'</strong>';
            })
            ->addColumn('rol', function ($usuarios){
                $roles = $usuarios->getRoleNames();
                $rol = '<ul>';
                for( $i = 0; $i < count($roles); $i++){
                    $rol .= '<li>'.'<strong style="text-transform: uppercase;">'.$roles[$i].'</strong></li>';
                }
                $rol .= '</ul>';
                return $rol;
            })
            ->addColumn('opciones', function ($usuarios){
                $opciones = '';
                if (Auth::user()->can('read_usuarios')){
                    $opciones .= '<button type="button" class="btn btn-sm action-icon getInfo icon-dual-blue"><i class="mdi mdi-account-circle"></i></button>';
                }
                if (Auth::user()->can('read_usuarios')){
                    //$opciones .= '<a href=" '.route('Sympathizers.edit', $tocados->tocado_id).' " class="action-icon icon-dual-warning"><i class="mdi mdi-account-cog"></i></a>';
                    $opciones .= '<button type="button" class="btn btn-sm action-icon btnModalEdit icon-dual-warning"><i class="mdi mdi-account-cog"></i></button>';
                }
                return $opciones;
            })
            ->rawColumns(['nombre','rol','opciones'])
            ->toJson();
        }
       // $usuarios = User::orderBy('nombre','ASC')->get();
       // $roles = Role::all();
       // return view('administrador.usuarios.users',compact('usuarios','roles'));
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario =  User::create($request->all());
        $u = $usuario;
        $u->password = bcrypt($request->password);
        $u->save();
        $u->syncRoles($request->roles);
        if ($usuario == true){
            $success = true;
            $message = "Usuario registrado correctamente";
        }else{
            $success = true;
            $message = "Fallo el registro";
        }
        return response()->json([
           'success' => $success,
           'message' => $message,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        if($usuario->hasRole('callcenter')){
            $created_at = Owner::select('created_at')->where('user_id',$id)->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))->get();
        }else{
            $created_at = Sympathizer::select('created_at')->where('user_id',$id)->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))->get();
        }

        foreach($created_at as $key => $date){
            $lideres[] = Leader::whereDate('created_at',$date->created_at)->where('user_id',$id)->count();
        }
        foreach($created_at as $key => $date){
            $movilizadores[] = Mobilizer::whereDate('created_at',$date->created_at)->where('user_id',$id)->count();
        }
        foreach($created_at as $key => $date){
            $tocados[] = Tocados::whereDate('created_at',$date->created_at)->where('user_id',$id)->count();
        }
        foreach($created_at as $key => $date){
            $propietarios[] = Owner::whereDate('created_at',$date->created_at)->where('user_id',$id)->count();
        }
        foreach($created_at as $key => $date){
            $simpatizantes[] = Simpatizantes::whereDate('created_at',$date->created_at)->where('user_id',$id)->count();
             $total[] = $lideres[$key] + $movilizadores[$key] +  $tocados[$key] + $propietarios[$key] + $simpatizantes[$key];
        }

        if (empty($lideres))
        {
          //  echo 'El array SÍ está vacío';
            $lideres = 0;
        }
        else{
            $lideres;
        }
        if (empty($movilizadores))
        {
          //  echo 'El array SÍ está vacío';
            $movilizadores = 0;
        }
        else{
            $movilizadores;
        }
        if (empty($tocados))
        {
          //  echo 'El array SÍ está vacío';
            $tocados = 0;
        }
        else{
            $tocados;
        }
        if (empty($propietarios))
        {
          //  echo 'El array SÍ está vacío';
            $propietarios = 0;
        }
        else{
            $propietarios;
        }
        if (empty($simpatizantes))
        {
          //  echo 'El array SÍ está vacío';
            $simpatizantes = 0;
        }
        else{
            $simpatizantes;
        }
        if (empty($total))
        {
          //  echo 'El array SÍ está vacío';
            $total = 0;
        }
        else{
            $total;
        }
        // return $created_at;
        return view('administrador.usuarios.show', compact(
            'usuario',
            'created_at',
                    'lideres',
                    'movilizadores',
                    'tocados',
                    'propietarios',
                    'simpatizantes',
                   'total',
                'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $user)
    {
        $usuarios = User::findOrFail($user);
        $roles = Role::all();
        return view('administrador.usuarios.usuarios_edit',compact('usuarios','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $user)
    {
       // return $request->all();
    //
        $update_rol = User::findOrFail($user);
        $update_rol->syncRoles($request->roles);

        User::findOrFail($user)->update($request->all());
        return redirect()->back()->with('status_update','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::findOrFail($user)->delete();
        return redirect()->back()->with('status_info','ELIMINADO CORRECTAMENTE');
    }
}
