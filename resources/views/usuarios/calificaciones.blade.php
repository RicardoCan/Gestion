@extends('layouts.usuario')
@section('titulo','Calificaciones')
@section('contenido')

<div id="calificacion" class="container">

  <center><h1 style="color: white">Lista De Calificaciones</h1></center>

  <div class="container">
    <div class="row">
     <div class="col-10">

      <input type="text" placeholder="Buscar" v-model="buscar" class="form-control">

       <br>

      <div class="container">
        <div class="row">
          <div class="col-4">

          <a href="{{url('imprimir3')}}" target="_black"><button class="btn btn-success">Generar PDF</button></a>

          </div>
        </div>
      </div>
       
     </div> 
    </div>
  </div>

  <br>

  <div class="container">
     <div class="row">
        <div class="col clearfix">

          <div class="table-responsive">
            <table class="table table-bordered">
            <thead style="background:orange" >
              <th><center>Nombres</center></th>
              <th><center>Apellidos</center></th>
              <th><center>Tareas Entregadas</center></th>
              <th><center>Total De Tareas<center></th>
              <th><center>Tareas Atrasadas</center></th> 
              <th><center>Estatus</center></th>
              <th><center>Opciones</center></th>
            </thead>

            <tbody>
              <tr v-for="(calificacion,index) in filtroCalificaciones" style="color: white">
                <td><center>@{{calificacion.id_nombre}}<center></td>
                <td><center>@{{calificacion.apellidos}}</center></td>
                <td><center>@{{calificacion.tareas_completas}}</center></td>
                <th><center>@{{calificacion.tareas_estandar}}</center></th>
                <td><center>@{{calificacion.tareas_atrasadas}}</center></td>
                <td><center>@{{calificacion.aprobado}}</center></td>
                
                
                <td>
                 <center><span class="fas fa-pencil-alt btn btn-xs btn-primary" v-on:click="guardarCalificaciones(calificacion.id_nombre)"></span>

                  <span class="fas fa-trash btn btn-xs btn-danger" v-on:click="eliminarCalificaciones(calificacion.id_nombre)"></span></center>
                  
                </td>
              </tr>
            </tbody>
          </div>
      </table>
    </div>
        

<div class="container">
  <div class="row justify-content-center">
    <div class="col-2">

</div>
  <div class="col-5">

        <center><h1 style="color: white">Ingresar Datos</h1></center>

        <input type="text" placeholder="Escriba Nombres" v-model="id_nombre" class="form-control">
        <br> 
        <input type="text" placeholder="Escriba Apellidos" v-model="apellidos" class="form-control">
        <br>  
        <input type="number" placeholder="No.Tareas Completas" v-model="tareas_completas" class="form-control">
        <br> 
        <input type="number" placeholder="No.Tareas Marcadas" v-model="tareas_estandar" class="form-control">
        <br>
        <input type="number" placeholder="No.Tareas Atrasadas" v-model="tareas_atrasadas" class="form-control">
        <br>
        <select class="form-control" v-model="aprobado">
         <option>
           APROVADO
         </option> 
         <option>
           REPROVADO
         </option>
        </select>
        <br>

        <div class="container">
          <div class="row">
           <div class="col clearfix">

               <center><button class="btn btn-primary" v-on:click="actualizarCalificaciones(id_nombre)">Guardar</button>

              <button class="btn btn-danger" v-on:click="cancelarCalificaciones()">Cancelar</button>

              <button class="btn btn-warning" v-on:click="agregarCalificaciones(id_nombre)">Agregar</button>

              <button class="btn btn-info"><a href="comprousu" style="color: white">Siguiente</a></button></center>
              
              <br>
              
              <div class="container">
                <div class="row">
                  <div class="col clearfix">

                     <center><button class="btn btn-secondary"><a href="alumusu" style="color: white">Anterior</a></button></center>
                    
                  </div>
                </div>
              </div>
                             
           </div> 
        </div>
      </div>

        </div> 
        <div class="col-2">
            </div>
       </div>
    </div>

        <br>

                </div>

             </div>

          </div>

      </div>

</div>




@endsection

@push('scripts')
	<script src="js/vue-resource.js"></script>
	<script src="js/calificaciones/calificaciones.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/jquery.min.js"></script>
@endpush