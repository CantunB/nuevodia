<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\District;
use App\Models\OwnerTocado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OwnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:create_propietarios')->only(['create','store']);
        $this->middleware('role_or_permission:read_propietarios')->only(['index','show']);
        $this->middleware('role_or_permission:update_propietarios')->only(['edit','update']);
        $this->middleware('role_or_permission:delete_propietarios')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $distritos = District::all();
        if (Auth::user()->hasRole('Super Admin')) {
            $lista = Owner::all();
        }else{
            $lista = Owner::where('user_id',Auth::user()->id)->get();

        }

       //return $lista;
       return view('owners.index',compact('distritos','lista'));
    }
    public function store(Request $request)
    {
        /** @var  $rules  INICIA VALIDACION PARA LOS PROPIETARIOS*/
            $rules = [
                'clave_elector' => 'required|unique:owners,clave_elector',
                'fe_nacimiento' => 'date_format:Y-m-d'
            ];
            $messages = [
                'clave_elector.required' => 'Necesitamos la :attribute para el registro',
                'clave_elector.unique' => 'La :attribute ya fue capturada!',
                'fe_nacimiento.date_format' => 'La :attribute no coincide con el formato necesario'
            ];
            $attributes = [
                'clave_elector' => 'clave de elector',
                'fe_nacimiento' => 'fecha de nacimiento'
            ];
            $validator = Validator::make($request->all(), $rules, $messages, $attributes);

            if ($validator->fails())
            {
                return redirect()->route('CallCenter.index')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('status_error','FALLO EL REGISTRO DEL PROPIETARIO REVISA LOS DATOS');
            }
        /** TERMINA LA VALIDACION SI ES CORRECTO SE ALMACENARA EL REGISTRO  */
        Owner::create($request->all());
        return redirect()->route('CallCenter.index')->with('status_success','PROPIETARIO CREADO CORRECTAMENTE');
    }

    public function show($id){
        $propietarios =  OwnerTocado::where('owner_id',$id)->get();
        return view('owners.show',compact('propietarios'));
    }

    public function edit($id)
    {
        $distritos = District::all();
        $propietario = Owner::findOrFail($id);
        return view('owners.edit', compact('distritos', 'propietario'));
    }

    public function update(Request $request, $id)
    {
        $propietario = Owner::find($id)->update($request->all());
        return redirect()->route('Owners.index')->with('status_info','Actualizado Correctamente');
    }

    public function destroy($id)
    {
        $propietario = Owner::findOrFail($id)->delete();
        return redirect()->route('Owners.index')->with('status_info','Propietario eliminado correctamente');
    }
}
