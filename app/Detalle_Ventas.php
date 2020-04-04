<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Ventas extends Model
{
    protected $table='detalles_ventas';
    protected $primaryKey='id';
    protected $with=['producto','venta'];

    public $Fillable=[
    	'id',
    	'id_producto',
    	'cantidad',
    	'precio',
    	'total',
    	'folio'
    ];

    public function producto(){
    	return $this->belongsTo(Productos::class,'id_producto','id_producto');
    }

    public function venta(){
    	return $this->belongsTo(Ventas::class,'folio','folio');
    }
}
