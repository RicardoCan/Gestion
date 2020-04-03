<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificaciones;
use Codedge\Fpdf\Fpdf\Fpdf;

class apiCalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $calificacion=Calificaciones::all();
        return $calificacion;

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
        $calificacion=new Calificaciones;
        $calificacion->id_nombre=$request->get('id_nombre');
        $calificacion->apellidos=$request->get('apellidos');
        $calificacion->tareas_completas=$request->get('tareas_completas');
        $calificacion->tareas_estandar=$request->get('tareas_estandar');
        $calificacion->tareas_atrasadas=$request->get('tareas_atrasadas');
        $calificacion->aprobado=$request->get('aprobado');
        $calificacion->save();

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

        $calificacion=Calificaciones::find($id);
        return $calificacion;
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

        $calificacion=Calificaciones::find($id);
        $calificacion->id_nombre=$request->get('id_nombre');
        $calificacion->apellidos=$request->get('apellidos');
        $calificacion->tareas_completas=$request->get('tareas_completas');
        $calificacion->tareas_estandar=$request->get('tareas_estandar');
        $calificacion->tareas_atrasadas=$request->get('tareas_atrasadas');
        $calificacion->aprobado=$request->get('aprobado');
        $calificacion->save();

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

        return Calificaciones::destroy($id);
    }

     public function imprimir3(){
      
        $calificacion=Calificaciones::all();

    
        $pdf=new Fpdf('P','mm','A4');

     
        $pdf->AddPage();

        $pdf->SetFont('Arial','B',15);
        $pdf->SetFillColor(75,75,300);
        $pdf->SetDrawColor(50, 150,50);
        $pdf->SetTextColor(2,22,39);
        $pdf->Cell(190,8,utf8_decode('LISTADO DE CALIFICACIONES'),0,1,'C',True);
        $pdf->Ln(15);


        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(50,8,utf8_decode('NOMBRES'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(36,8,utf8_decode('APELLIDOS'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(26,8,utf8_decode('TAREAS EN.'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(26,8,utf8_decode('TAREAS ES.'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(26,8,utf8_decode('TAREAS AT.'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(28,8,utf8_decode('ESTATUS'),1,1,'C',true);
        
        
       
        $pdf->setFont('Arial','',10);
        foreach ($calificacion as $calificaciones) 
        {
            $pdf->SetFillColor(68,163,243);
            $pdf->Cell(50,8,utf8_decode($calificaciones->id_nombre),1,0,'C');
            $pdf->Cell(36,8,utf8_decode($calificaciones->apellidos),1,0,'C');
            $pdf->Cell(26,8,utf8_decode($calificaciones->tareas_completas),1,0,'C');
            $pdf->Cell(26,8,utf8_decode($calificaciones->tareas_estandar),1,0,'C');
            $pdf->Cell(26,8,utf8_decode($calificaciones->tareas_atrasadas),1,0,'C');
            $pdf->Cell(28,8,utf8_decode($calificaciones->aprobado),1,1,'C');
            
        }

        $pdf->Output();
        exit;
    }
}

