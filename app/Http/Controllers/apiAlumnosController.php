<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumnos;
use Codedge\Fpdf\Fpdf\Fpdf;

class apiAlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnos=Alumnos::all();
        return $alumnos;
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

        $alumnos=new Alumnos;
        $alumnos->id_nombres=$request->get('id_nombres');
        $alumnos->apellidos=$request->get('apellidos');
        $alumnos->edad=$request->get('edad');
        $alumnos->grupo=$request->get('grupo');
        $alumnos->encargado=$request->get('encargado');
        $alumnos->activo=$request->get('activo');
        $alumnos->save();

        

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
        $alumnos=Alumnos::find($id);
        return $alumnos;
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
        $alumnos=Alumnos::find($id);
        $alumnos->id_nombres=$request->get('id_nombres');
        $alumnos->apellidos=$request->get('apellidos');
        $alumnos->edad=$request->get('edad');
        $alumnos->grupo=$request->get('grupo');
        $alumnos->encargado=$request->get('encargado');
        $alumnos->activo=$request->get('activo');
        $alumnos->save();
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
      return Alumnos::destroy($id);
    }

    public function imprimir(){
         
        $alumns=Alumnos::all();

        
        $pdf=new Fpdf('P','mm','A4');

       
        $pdf->AddPage();

       
        $pdf->SetFont('Arial','B',15);   
        $pdf->SetFillColor(75,75,300);
        $pdf->SetDrawColor(50, 150,50);
        $pdf->SetTextColor(2,22,39);
        $pdf->Cell(190,8,utf8_decode('LISTADO DE ALUMNOS'),0,1,'C',True);
        $pdf->Ln(15);


        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(43,8,utf8_decode('NOMBRES'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(30,8,utf8_decode('APELLIDOS'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(15,8,utf8_decode('EDAD'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(17,8,utf8_decode('GRUPO'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(64,8,utf8_decode('ENCARGADO'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(22,8,utf8_decode('ESTADO'),1,1,'C',true);
     

        $pdf->setFont('Arial','',10);
        foreach ($alumns as $alumnos) 
        {
            $pdf->SetFillColor(68,163,243);
            $pdf->Cell(43,8,utf8_decode($alumnos->id_nombres),1,0,'C',true);
            $pdf->Cell(30,8,utf8_decode($alumnos->apellidos),1,0,'C');
            $pdf->Cell(15,8,utf8_decode($alumnos->edad),1,0,'C');
            $pdf->Cell(17,8,utf8_decode($alumnos->grupo),1,0,'C');
            $pdf->Cell(64,8,utf8_decode($alumnos->encargado),1,0,'C');
            $pdf->Cell(22,8,utf8_decode($alumnos->activo),1,1,'C');
            
        }
        
        $pdf->Output();
        exit;
    }
}

