<?php

use App\Models\Simpatizantes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //Storage::disk('google')->put('Drive.txt',"HOLA MUNDITO CRUEL" );
    return view('welcome');
});
/*
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
*/

Auth::routes();
Route::get('/Mobilizers/search','MobilizersController@search')->name('Mobilizers.search');
Route::get('/Mobilizers/single','MobilizersController@single')->name('Mobilizers.single');
Route::get('/Sympathizers/search','SympathizersController@search')->name('Sympathizers.search');
<<<<<<< HEAD

Route::get('Sympathizers/searcher', 'SympathizersController@searcher')->name('Sympathizers.searcher');
Route::get('Sympathizers/searcher/data', 'SympathizersController@searcher_data')->name('Sympathizers.searcher_data');
Route::get('Encuestas/Resultados', 'Callcenter\EncuestasController@results')->name('Encuestas.results');
Route::get('Gestiones/gestiones', 'GestionesController@Gestiones')->name('Gestiones.gestiones');


=======
Route::get('Sympathizers/searcher', 'SympathizersController@searcher')->name('Sympathizers.searcher');
Route::get('Sympathizers/searcher/data', 'SympathizersController@searcher_data')->name('Sympathizers.searcher_data');
Route::get('Encuestas/Resultados', 'Callcenter\EncuestasController@results')->name('Encuestas.results');
Route::get('Encuestas/Detalles', 'Callcenter\EncuestasController@details')->name('Encuestas.details');
Route::get('Gestiones/gestiones', 'GestionesController@Gestiones')->name('Gestiones.gestiones');
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/Leaders','Lideres\LeadersController');
Route::resource('/Distritos','DistrictController');
Route::resource('/Mobilizers','Movilizadores\MobilizersController');
Route::resource('/Tocados','Tocados\TocadosController');
Route::resource('/Sympathizers','SympathizersController');
Route::resource('/Simpatizantes','SimpatizantesController');
Route::resource('/Owners','OwnersController');
Route::resource('/CallCenter','CallCenterController');
Route::resource('/Reports','ReportsController');
Route::resource('Secciones', 'SeccionesController');
Route::resource('Gestiones', 'GestionesController');
Route::resource('Sorteos', 'DrawsController');
Route::resource('Empresas', 'Empresas\EnterpriseController');
Route::resource('Empleados', 'Empresas\EmployeeController');
Route::resource('Mypymes', 'Mypymes\MypymesController');
Route::resource('Encuestas', 'Callcenter\EncuestasController');
<<<<<<< HEAD
=======
Route::resource('Invitacion', 'Callcenter\InvitacionController');
Route::resource('Despensas', 'Despensas\PantriesController');
Route::resource('Confirmacion', 'Tocados\ConfirmationResultsController');
Route::resource('Amigos', 'Friends\FriendsController');
Route::resource('Coordinadores', 'Votos\CoordinatorsController');
Route::resource('Invitados', 'Votos\GuestsController');

>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)


//Route::get('/Client_search/{texto}','Client_searchController@show')->name('Client_search');
Route::get('/PrintLeaders','PrintLeadersController@PDF')->name('PrintLeaders');
Route::get('/PrintMobilizers','PrintMobilizersController@PDF')->name('PrintMobilizers');
Route::get('/ExportMobilizers','PrintMobilizersController@export')->name('mobilizers.export');
Route::get('/PrintSympathizers','PrintSympathizersController@PDF')->name('PrintSympathizers');
Route::get('/PrintOwners','PrintOwnerController@PDF')->name('PrintOwners');

Route::group(['web', '/Print'], function(){
<<<<<<< HEAD
   Route::get('/Print/tocados_sc','ReportsController@tocados_sc_pdf')->name('tocados_sc.pdf');
   Route::get('/Print/leaders','ReportsController@leaders_pdf')->name('leaders.pdf');
   Route::get('/Print/mobilizers','ReportsController@mobilizers_pdf')->name('mobilizers.pdf');
   Route::get('/Print/mobilizers/{lider}','ReportsController@mobilizers_lider_pdf')->name('mobilizers_lider.pdf');
   Route::get('/Print/single/lider/{lider}', 'ReportsController@single_lider_info')->name('single_lider_info.pdf');
   Route::get('/Print/tocados_complet/{mobilizer}', 'Reports\pdf\TocadosController@tocados_complet')->name('tocados_complet.pdf');

=======
    Route::get('/Print/tocados_sc','ReportsController@tocados_sc_pdf')->name('tocados_sc.pdf');
    Route::get('/Print/leaders','ReportsController@leaders_pdf')->name('leaders.pdf');
    Route::get('/Print/mobilizers','ReportsController@mobilizers_pdf')->name('mobilizers.pdf');
    Route::get('/Print/mobilizers/{lider}','ReportsController@mobilizers_lider_pdf')->name('mobilizers_lider.pdf');
    Route::get('/Print/single/lider/{lider}', 'ReportsController@single_lider_info')->name('single_lider_info.pdf');
    Route::get('/Print/tocados_complet/{mobilizer}', 'Reports\pdf\TocadosController@tocados_complet')->name('tocados_complet.pdf');
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
});

Route::group(['web', '/Export'], function(){
    Route::get('Export/users','ReportsController@export_users')->name('export_users');
    Route::get('Export/sympathizers','ReportsController@export_sympathizers')->name('export_sympathizers');
    Route::get('Export/Leaders','ReportsController@export_leaders')->name('export_leaders');
    Route::get('Export/Mobilizers','ReportsController@export_mobilizers')->name('export_mobilizers');
    Route::get('Export/Tocados','ReportsController@export_tocados')->name('export_tocados');
    Route::get('Export/SympathizersGeneral','Reports\excel\SympathizersController@export_general')->name('export_general');
    Route::get('Export/SympathizersFinal','Reports\excel\SympathizersController@export_final')->name('export_final');
    Route::get('Export/leaders/users', 'ReportsController@leader_user')->name('leader_user');
    Route::get('Export/CallCenter/confirmados', 'ReportsController@cc_confirmados')->name('CallCenter.confirmados');
    Route::get('Export/Mobilizers/ConfirmacionResultados/{mobilizer}', 'Reports\excel\MobilizerController@confirmacion_resultados')->name('Mobilizers.cr');
});

Route::group(['web ','Administrador'],function (){
    Route::get('/Administrador','AdministradorController@index')->name('admin.index');
    Route::get('/Administrador/sympathizers','AdministradorController@sympathizers')->name('admin.sympathizers');
    Route::post('/Administrador/sympathizers/getInfoLider', 'AdministradorController@getInfoLider')->name('admin.sympathizers_getLider');
    Route::post('/Administrador/sympathizers/getInfoMovilizador', 'AdministradorController@getInfoMovilizador')->name('admin.sympathizers_getMovilizador');
    Route::post('/Administrador/sympathizers/getInfoTocado', 'AdministradorController@getInfoTocado')->name('admin.sympathizers_getTocado');
    Route::get('/Administrador/lideres','AdministradorController@lideres')->name('admin.lideres');
    Route::post('/Administrador/lideres','AdministradorController@lideres_nuevo')->name('admin.lideres_nuevo');
    Route::get('/Administrador/movilizadores','AdministradorController@movilizadores')->name('admin.movilizadores');
<<<<<<< HEAD
   Route::get('/Administrador/tocados','AdministradorController@tocados')->name('admin.tocados');
   Route::post('/Administrador/movilizadores','AdministradorController@movilizadores_nuevo')->name('admin.movilizadores_nuevo');
   Route::resource('/Administrador/usuarios','UsersController');
   Route::resource('/Administrador/roles','RolesController');
   Route::resource('/Administrador/permisos','PermissionsController');

=======
    Route::get('/Administrador/tocados','AdministradorController@tocados')->name('admin.tocados');
    Route::post('/Administrador/movilizadores','AdministradorController@movilizadores_nuevo')->name('admin.movilizadores_nuevo');
    Route::resource('/Administrador/usuarios','UsersController');
    Route::resource('/Administrador/roles','RolesController');
    Route::resource('/Administrador/permisos','PermissionsController');
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
});

Route::post('Secciones/data', 'SeccionesController@getData')->name('secciones.getSeccion');
Route::post('Confirmacion/data', 'Tocados\ConfirmationResultsController@getConfirmacion')->name('Confirmacion.getConfirmacion');
Route::post('Gestiones/data', 'GestionesController@getData')->name('gestiones.getGestion');
<<<<<<< HEAD



Route::post('Distritos/distritos', 'Distritacion\DistritosController@getDistritos')->name('Distritos.getDistritos');
=======
Route::post('Confirmacion/tocados', 'Tocados\ConfirmationResultsController@getTocados')->name('Confirmacion.getTocados');
Route::post('Distritos/distritos', 'Distritacion\DistritosController@getDistritos')->name('Distritos.getDistritos');


Route::get('waping/send', 'WapingController@send');
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
