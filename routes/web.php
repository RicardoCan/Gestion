<?php

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
    return view('/');
});



 //Apis
Route::apiResource('apiAsignaciones','apiAsignacionesController');
Route::apiResource('apiAlumnos','apiAlumnosController');
Route::apiResource('apiCalificaciones','apiCalificacionesController');
Route::apiResource('apiClases','apiClasesController');
Route::apiResource('apiAdmin','apiAdministradoresController');
Route::apiResource('apiCompromisos','apiCompromisosController');



//Vistas Del Admin
Route::view('asig','asignaciones.asignaciones');
Route::view('alum','alumnos.alumnos');
Route::view('calif','calificaciones.calificaciones');
Route::view('clas','clases.clases');
Route::view('regis','registros.registros');
Route::view('comp','compromisos.compromisos');




//Vistas Del Usuario
Route::view('alumusu','usuarios.alumno');
Route::view('califusu','usuarios.calificaciones');
Route::view('comprousu','usuarios.compromisos');



//Vista De Error
Route::view('error','login.error');



//Vista De Admin Tabla 
Route::view('admin','administradores.administradores');

//Inicio De Sesion
Route::view('/','login.logueo');
Route::post('login','AccesoController@validar');
Route::get('logout','AccesoController@salir');

//PDF
Route::get('imprimir','apiAlumnosController@imprimir');
Route::get('imprimir2','apiAsignacionesController@imprimir2');
Route::get('imprimir3','apiCalificacionesController@imprimir3');
Route::get('imprimir4','apiClasesController@imprimir4');
Route::get('imprimir5','apiCompromisosController@imprimir5');



//Maestro Detalle
Route::apiResource('prod','ApiProductosController');
Route::apiResource('apiventa','ApiVentasController');
Route::apiResource('apidetalle','ApiDetalle_ventasController');

Route::view('ventas','venta');