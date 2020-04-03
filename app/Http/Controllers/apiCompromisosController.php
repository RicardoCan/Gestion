<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compromisos;
use Codedge\Fpdf\Fpdf\Fpdf;

class apiCompromisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $compromiso=Compromisos::all();
        return $compromiso;
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

        $compromiso=new Compromisos;
        $compromiso->id_nombre=$request->get('id_nombre');
        $compromiso->apellidos=$request->get('apellidos');
        $compromiso->accion=$request->get('accion');
        $compromiso->fecha_programada=$request->get('fecha_programada');
        $compromiso->hora=$request->get('hora');
        $compromiso->save();
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
        $compromiso=Compromisos::find($id);
        return $compromiso;
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
        $compromiso=Compromisos::find($id);
        $compromiso->id_nombre=$request->get('id_nombre');
        $compromiso->apellidos=$request->get('apellidos');
        $compromiso->accion=$request->get('accion');
        $compromiso->fecha_programada=$request->get('fecha_programada');
        $compromiso->hora=$request->get('hora');
        $compromiso->save();
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
         return Compromisos::destroy($id);
    }

    public function imprimir5(){

     // obtener listado de productos
        $compromiso=Compromisos::all();

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
        $pdf->Cell(190,8,utf8_decode('LISTADO DE EVENTOS PROGRAMADOS'),0,1,'C',True);
        $pdf->Ln(15);


        $pdf->SetFont('Arial','B',11);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(45,8,utf8_decode('NOMBRES'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(35,8,utf8_decode('APELLIDOS'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(40,8,utf8_decode('REALIZACIÓN'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(50,8,utf8_decode('FECHA PROGRAMADA'),1,0,'C',true);
        $pdf->SetFillColor(68,163,243);
        $pdf->Cell(25,8,utf8_decode('HORA'),1,1,'C',true);
     
        
        
       
        $pdf->setFont('Arial','',10);
        foreach ($compromiso as $compromisos) 
        {
            $pdf->SetFillColor(68,163,243);
            $pdf->Cell(45,8,utf8_decode($compromisos->id_nombre),1,0,'C');
            $pdf->Cell(35,8,utf8_decode($compromisos->apellidos),1,0,'C');
            $pdf->Cell(40,8,utf8_decode($compromisos->accion),1,0,'C');
            $pdf->Cell(50,8,utf8_decode($compromisos->fecha_programada),1,0,'C');
            $pdf->Cell(25,8,utf8_decode($compromisos->hora),1,1,'C');
            
            
        }
        



        // $pdf->Cell(40,8,utf8_decode(''),'B',0,'C');

        // 'Enviar a impresion'
        $pdf->Output();
        exit;
    }
}
