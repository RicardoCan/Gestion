<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
   protected $table = 'ventas';
   protected $primaryKey = 'folio';

   public $Fillable = [
   	'folio',
   	// 'id_vendedor',
   	// 'cantidad',
   	'total',
   	'fecha_venta'
   ];
   
}
