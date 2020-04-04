@extends('layouts.usuario')
@section('titulo','Ventas')
@section('contenido')

<div id="ventas">
	<br>
	<div class="container">
		<h3 style="color: white">FOLIO: @{{folio}}</h3>
		<h3 style="color: white">Fecha Venta:@{{fecha_venta}}</h3>
		<div class="row">
			<br>
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" class="form-control" v-model="codigo" ref="buscar"
					v-on:keyup.enter="getProducto()">

					<span class="input-group-btn">
						<button type="button" class="btn btn-primary" @click="getProducto()">Agregar</button>
					</span>
				</div>
				<br>
				<button class="btn btn-warning btn-lg" @click="vender()">Guardar Venta</button>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col clearfix">
				<table class="table table-bordered">
					<thead style="background:orange">
						<th>SKU</th>
						<th>NOMBRE</th>
						<th width="15%">PRECIO</th>
						<th width="15%">CANTIDAD</th>
						<th width="15%">TOTAL</th>
						<th>ACCIONES</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in ventas">
							<td>@{{v.id_producto}}</td>
							<td>@{{v.nombre}}</td>
							<td>@{{v.precio}}</td>
							<td>
								<input type="number" class="form-control" min="1" v-model.number="cantidades[index]">
							</td>
							<td><b>$ @{{totalProd(index)}}</b></td>
							<td>
								<span class="fas fa-trash btn btn-xs btn-danger" @click="eliminarProducto(index)"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col clearfix">
				<table class="table table-bordered">
					<tr>
						<th width="25%" style="background: orange">Total</th>
						<td><h2 class="text-white">$@{{total}}</h2></td>
					</tr>

					<tr>
						<th style="background: orange">Paga con:</th>
						<td><h2><input type="number" class="form-control" v-model="pago" min="0"></h2></td>
					</tr>
					<tr>
						<th style="background: orange">Cambio de:</th>
						<td><h2 class="text-white">$@{{cambio}}</h2></td>
					</tr>
				</table>

			</div>
			
		</div>
		
	</div>
</div>

<br><br><br>

 
              <div class="container">
                <div class="row">
                  <div class="col clearfix">

                     
                     <center><button class="btn btn-secondary"><a href="{{url('logout')}}" style="color: white">Salir</a></button></center>
                    
                  </div>
                </div>
              </div>

@endsection

@push('scripts')
<!-- <script src="js/vue-resource.js"></script> -->
<script src="js/ventas.js"></script>
<script src="js/moment-with-locales.min.js"></script>
@endpush