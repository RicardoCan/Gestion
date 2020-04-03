<?php

namespace App\Http\Controllers;
use App\Administradores;

use Illuminate\Http\Request;

class apiAdministradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $administrador=Administradores::all();
        return $administrador;



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $administrador=new Administradores;
        $administrador->nick=$request->get('nick');
        $administrador->password=$request->get('password');
        $administrador->nombre=$request->get('nombre');
        $administrador->apellidos=$request->get('apellidos');
        $administrador->id_rol=$request->get('id_rol');
        $administrador->active=$request->get('active');
        $administrador->save();

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

        $administrador=Administradores::find($id);
        return $administrador;
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
        //
        $administrador=Administradores::find($id);
        $administrador->nick=$request->get('nick');
        $administrador->password=$request->get('password');
        $administrador->nombre=$request->get('nombre');
        $administrador->apellidos=$request->get('apellidos');
        $administrador->id_rol=$request->get('id_rol');
        $administrador->active=$request->get('active');
        $administrador->save();

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
        return Administradores::destroy($id);
    }

}