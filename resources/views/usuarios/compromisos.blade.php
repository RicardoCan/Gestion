@extends('layouts.usuario')
@section('titulo','Eventos')
@section('contenido')

<div id="compromiso" class="container">

  <center><h1 style="color: white">Lista De Eventos Programados</h1></center>

  <div class="container">
    <div class="row">
     <div class="col-10">

      <input type="text" placeholder="Buscar" v-model="buscar" class="form-control">

       <br>

      <div class="container">
        <div class="row">
          <div class="col-4">
            
          <a href="{{url('imprimir5')}}" target="_black"><button class="btn btn-success">Generar PDF</button></a>

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
              <th><center>Realización</center></th> 
              <th><center>Fecha Programada</center></th>
              <th><center>Hora</center></th>
              <th><center>Opciones</center></th>
            </thead>

            <tbody>
              <tr v-for="(compromiso,index) in filtroCompromiso" style="color: white">
                <td><center>@{{compromiso.id_nombre}}</center></td>
                <td><center>@{{compromiso.apellidos}}</center></td>
                <td><center>@{{compromiso.accion}}</center></td>
                <td><center>@{{compromiso.fecha_programada}}</center></td>
                <td><center>@{{compromiso.hora}}</center></td>
                
                <td>
                  <center><span class="fas fa-pencil-alt btn btn-xs btn-primary" v-on:click="guardarCompromiso(compromiso.id_nombre)"></span>

                  <span class="fas fa-trash btn btn-xs btn-danger" v-on:click="eliminarCompromiso(compromiso.id_nombre)"></span></center>
                  
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

        <select class="form-control" v-model="accion">
         <option>
           PRIMERA COMUNIÓN
         </option> 
         <option>
           CONFIRMACIÓN
         </option>
        </select>
        <br>

        <input type="date" placeholder="Escriba Fecha Programada" v-model="fecha_programada" class="form-control">
        <br>
        <input type="time" placeholder="Escriba Hora" v-model="hora" class="form-control">

        <br>

        <div class="container">
          <div class="row">
           <div class="col clearfix">

             <center> <button class="btn btn-primary" v-on:click="actualizarCompromiso(id_nombre)">Guardar</button>

              <button class="btn btn-danger" v-on:click="cancelarCompromiso()">Cancelar</button>

              <button class="btn btn-warning " v-on:click="agregarCompromiso(id_nombre)">Agregar</button>

              <button class="btn btn-info"><a href="califusu" style="color: white">Anterior</a></button></center>




               <br>
              
              <div class="container">
                <div class="row">
                  <div class="col clearfix">

                     <center><button class="btn btn-dark"><a href="ventas" style="color: white">Ventas</a></button></center>

                    <!--  <center><button class="btn btn-secondary"><a href="{{url('logout')}}" style="color: white">Salir</a></button></center> -->
                    
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
	<script src="js/compromisos/compromisos.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
@endpush