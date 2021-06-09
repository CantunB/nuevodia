<?php

namespace App\Http\Controllers\Distritacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distritacion;

class DistritosController extends Controller
{

    public function getDistritos(Request $request)
    {
        $seccion = $request->seccion;
        $distritos = Distritacion::where('seccion_electoral',$seccion)
                              //->with('subcategories')
                              ->get();
        return response()->json([
            'distritos' => $distritos
        ]);
    }

}
