@extends('layouts.layout')
@section('titulo','Asignaciones')
@section('contenido')

<div id="asignacion" class="container">

  <center><h1 style="color: white">Lista De Labores</h1></center>

  <div class="container">
    <div class="row">
     <div class="col-10">

      <input type="text" placeholder="Buscar" v-model="buscar" class="form-control">

       <br>

      <div class="container">
        <div class="row">
          <div class="col-6">

          <button class="btn btn-secondary"><a href="admin" style="color: white">Ingresar Lista De Administradores</a></button>

          <a href="{{url('imprimir2')}}" target="_black"><button class="btn btn-success">Generar PDF</button></a>

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
            <table class="table table-hover">
            <thead style="background:orange" > 
              <th><center>Nombres</center></th>
              <th><center>Apellidos</center></th>
              <th><center>Edad</center></th> 
              <th><center>Labor</center></th>
              <th><center>Estatus</center></th>
              <th><center>Opciones</center></th>
            </thead>

            <tbody>
              <tr v-for="(asignacion,index) in filtroAsignacion" style="color: white" class="table-active">
                <td><center>@{{asignacion.id_nombre}}</center></td>
                <td><center>@{{asignacion.apellidos}}</center></td>
                <td><center>@{{asignacion.edad}}</center></td>
                <td><center>@{{asignacion.cargo}}</center></td>
                <td><center>@{{asignacion.activo}}</center></td>
                
                <td>
                  <center><span class="fas fa-pencil-alt btn btn-xs btn-primary" v-on:click="guardarAsignacion(asignacion.id_nombre)"></span>

                  <span class="fas fa-trash btn btn-xs btn-danger" v-on:click="eliminarAsignacion(asignacion.id_nombre)"></span></center>
                  
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
        <input type="number" placeholder="Escriba Edad" v-model="edad" class="form-control">

         <br>

        <select class="form-control" v-model="cargo">
         <option>
           PADRE
         </option> 
         <option>
           MONAGUILLO
         </option>
         <option>
           SANCRISTAN
         </option>
         <option>
           CATEQUISTA
         </option>
        </select>

        <br>

        <select class="form-control" v-model="activo">
         <option>
           RECIEN INGRESO
         </option> 
         <option>
           ACTIVO
         </option>
         <option>
           BAJA PERMANENTE
         </option>
        </select>

        <br>

        <div class="container">
          <div class="row">
           <div class="col clearfix">

              <center><button class="btn btn-primary" v-on:click="actualizarAsignacion(id_nombre)">Guardar</button>

              <button class="btn btn-danger" v-on:click="cancelarAsignacion()">Cancelar</button>

              <button class="btn btn-warning " v-on:click="agregarAsignacion(id_nombre)">Agregar</button>

              <button class="btn btn-info"><a href="calif" style="color: white">Siguiente</a></button></center>

              <br>
              
              <div class="container">
                <div class="row">
                  <div class="col clearfix">

                     <center><button class="btn btn-dark"><a href="alum" style="color: white">Anterior</a></button></center>
                    
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
	<script src="js/asignaciones/asignaciones.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/jquery.min.js"></script>
@endpush