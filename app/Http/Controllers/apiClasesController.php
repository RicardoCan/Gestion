<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases;
use Codedge\Fpdf\Fpdf\Fpdf;

class apiClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clases=Clases::all();
        return $clases;
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

        $clases=new Clases;
        $clases->id_nombre=$request->get('id_nombre');
        $clases->apellidos=$request->get('apellidos');
        $clases->dia_clase=$request->get('dia_clase');
        $clases->nombre_lugar=$request->get('nombre_lugar');
        $clases->hora=$request->get('hora');
        $clases->save();
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
        $clases=Clases::find($id);
        return $clases;
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
        $clases=Clases::find($id);
        $clases->id_nombre=$request->get('id_nombre');
        $clases->apellidos=$request->get('apellidos');
        $clases->dia_clase=$request->get('dia_clase');
        $clases->nombre_lugar=$request->get('nombre_lugar');
        $clases->hora=$request->get('hora');
        $clases->save();
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
         return Clases::destroy($id);
    }

    public function imprimir4(){

     // obtener listado de productos
        $clase=Clases::all();

        // Instanciando un nuevo objeto con las dimensiones
        $pdf=new Fpdf('P','mm','A4');

        // Agregar una pagina
        $pdf->AddPage();

        // definimos un tipo de letra, estilo, tamaño
        $pdf->SetFont('Arial','B',15);
        
        // 
        // definimos parametros de celda
        // Cell(Ancho,alto,valor,borde,x,alineacion,salto de linea)
        // utf8_decode: es para hacentos
         
        $pdf->SetFillColor(75,75,300);
        $pdf->SetDrawColor(50, 150,50);
        $pdf->SetTextColor(2,22,39);
        $pdf->Cell(190,8,utf8_decode('LISTADO DE ClASES'),0,1,'C',True);
        $pdf->Ln(15);


        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(40,8,utf8_decode('NOMBRES'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(40,8,utf8_decode('APELLIDOS'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(30,8,utf8_decode('DIA'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(50,8,utf8_decode('NOMBRE LUGAR'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(35,8,utf8_decode('HORA'),1,1,'C',true);
        
        
       
        $pdf->setFont('Arial','',10);
        foreach ($clase as $clases) 
        {
            $pdf->SetFillColor(68,163,243);
            $pdf->Cell(40,8,utf8_decode($clases->id_nombre),1,0,'C');
            $pdf->Cell(40,8,utf8_decode($clases->apellidos),1,0,'C');
            $pdf->Cell(30,8,utf8_decode($clases->dia_clase),1,0,'C');
            $pdf->Cell(50,8,utf8_decode($clases->nombre_lugar),1,0,'C');
            $pdf->Cell(35,8,utf8_decode($clases->hora),1,1,'C');
            
        }
        



        // $pdf->Cell(40,8,utf8_decode(''),'B',0,'C');

        // 'Enviar a impresion'
        $pdf->Output();
        exit;
    }
}


