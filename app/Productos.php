<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';
    protected $primaryKey='id_producto';

    public $incrementing=false;
    public $timestamps=false;

    public $Fillable=[
    	'id_producto',
    	'nombre',
    	'precio',
    	'cantidad'
    ];
}
