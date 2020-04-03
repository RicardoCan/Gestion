<?php

namespace App\Http\Controllers;
use App\Asignaciones;
use Codedge\Fpdf\Fpdf\Fpdf;

use Illuminate\Http\Request;

class apiAsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
      $asignacion=Asignaciones::all();
      return $asignacion;
        
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
        $asignacion=new Asignaciones;
        $asignacion->id_nombre=$request->get('id_nombre');
        $asignacion->apellidos=$request->get('apellidos');
        $asignacion->edad=$request->get('edad');
        $asignacion->cargo=$request->get('cargo');
        $asignacion->activo=$request->get('activo');
        $asignacion->save();
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
        $asignacion=Asignaciones::find($id);
        return $asignacion;
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
        $asignacion=Asignaciones::find($id);
        $asignacion->id_nombre=$request->get('id_nombre');
        $asignacion->apellidos=$request->get('apellidos');
        $asignacion->edad=$request->get('edad');
        $asignacion->cargo=$request->get('cargo');
        $asignacion->activo=$request->get('activo');
        $asignacion->save();
       
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

        return Asignaciones::destroy($id);
    }

     public function imprimir2(){
       
        $asing=Asignaciones::all();

      
        $pdf=new Fpdf('P','mm','A4');

        $pdf->AddPage();


        $pdf->SetFont('Arial','B',15);
        $pdf->SetFillColor(75,75,300);
        $pdf->SetDrawColor(50, 150,50);
        $pdf->SetTextColor(2,22,39);
        $pdf->Cell(190,8,utf8_decode('LISTADO DE LABORES'),0,1,'C',True);
        $pdf->Ln(15);


        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(45,8,utf8_decode('NOMBRES'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(45,8,utf8_decode('APELLIDOS'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(17,8,utf8_decode('EDAD'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(40,8,utf8_decode('LABOR'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(40,8,utf8_decode('ESTATUS'),1,1,'C',true);
     

        $pdf->setFont('Arial','',10);
        foreach ($asing as $asignaciones) 
        {
            $pdf->SetFillColor(68,163,243);
            $pdf->Cell(45,8,utf8_decode($asignaciones->id_nombre),1,0,'C');
            $pdf->Cell(45,8,utf8_decode($asignaciones->apellidos),1,0,'C');
            $pdf->Cell(17,8,utf8_decode($asignaciones->edad),1,0,'C');
            $pdf->Cell(40,8,utf8_decode($asignaciones->cargo),1,0,'C');
            $pdf->Cell(40,8,utf8_decode($asignaciones->activo),1,1,'C');
            
        }
        
        $pdf->Output();
        exit;
    }
}


