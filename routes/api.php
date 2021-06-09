<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Jobs\ResolveWhatsappRequest;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
<<<<<<< HEAD
Route::prefix('/electoral')->group(function(){
=======
/*Route::prefix('/electoral')->group(function(){
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    Route::post('/login', 'api\Auth\LoginController@login');
   // Route::middleware('auth:api')->get('usuarios','api\Usuarios\UsersController@index');
    Route::resources([
        'usuarios' => 'api\Usuarios\UsersController',
    ]);
<<<<<<< HEAD
=======
});*/
Route::post('webhook', function (Request $request){
   // logger($request->all());
    ResolveWhatsappRequest::dispatch($request->all());
    return response()->noContent();
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
});

/*Route::group(['middleware' => 'auth:api'], function() {
    Route::resources([
        'usuarios' => 'api\Usuarios\UsersController',
    ]);
});*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
