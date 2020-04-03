@extends('layouts.layout')
@section('titulo','Alumnos')
@section('contenido')

<div id="alumno" class="container">

<center><h1 style="color: white">Lista De Alumnos</h1></center>

<center><h3 style="color: white">Sesion Iniciada Administrador@: {{Session::get('usuario')}}</h3></center>

  <div class="container">
    <div class="row">
     <div class="col-10">

      <input type="text" placeholder="Buscar" v-model="buscar" class="form-control">

      <br>

      <div class="container">
        <div class="row">
          <div class="col-6">


          <button class="btn btn-secondary"><a href="admin" style="color: white">Ingresar Lista De Administradores</a></button>


          <a href="{{url('imprimir')}}" target="_black"><button class="btn btn-success"> Generar PDF</button></a> 

            
     
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
              <th><center>Grupo</center></th>
              <th><center>Encargado</center></th>
              <th><center>Estatus</center></th>
              <th><center>Opciones</center></th>
            </thead>

            <tbody>
              <tr v-for="(alumno,index) in filtroAlumnos" style="color: white" class="table-active">
                <td><center>@{{alumno.id_nombres}}</center></td>
                <td><center>@{{alumno.apellidos}}</center></td>
                <td><center>@{{alumno.edad}}</center></td>
                <td><center>@{{alumno.grupo}}</center></td>
                <td><center>@{{alumno.encargado}}</center></td>
                <td><center>@{{alumno.activo}}</center></td>
                
                <td>

                  <center><span class="fas fa-pencil-alt btn btn-xs btn-primary" v-on:click="guardarAlumnos(alumno.id_nombres)"></span>

                  <span class="fas fa-trash btn btn-xs btn-danger" v-on:click="eliminarAlumnos(alumno.id_nombres)"></span></center>

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

        <input type="text" placeholder="Escriba Nombres" v-model="id_nombres" class="form-control">
        <br> 
        <input type="text" placeholder="Escriba Apellidos" v-model="apellidos" class="form-control">
        <br>  
        <input type="number" placeholder="Escriba Edad" v-model="edad" class="form-control">

        <br>

        <select class="form-control" v-model="grupo">
         <option>
           A
         </option> 
         <option>
           B
         </option>
         <option>
           C
         </option>
        </select>

        <br>

        <select class="form-control" v-model="encargado">
         <option>
           RICARDO ANTONIO CAN MATEY
         </option> 
         <option>
           JESUS ALBERTO CANUL ACOSTA
         </option>
         <option>
           TADEO JESUS DELGADO TUZ
         </option>
         <option>
           JESUS GABRIEL LOEZA CONRRADO
         </option>
         <option>
           RODRIGO ORLANDO KANTUN CHAN
         </option>
        </select>

        <br>

        <select class="form-control" v-model="activo">
         <option>
           ACTIVO
         </option> 
         <option>
           INACTIVO
         </option>
        </select>

        <br>
        
        <div class="container">
          <div class="row">
           <div class="col clearfix">

              <center><button class="btn btn-primary" v-on:click="actualizarAlumnos(id_nombres)">Guardar</button>

              <button class="btn btn-danger" v-on:click="cancelarAlumnos()">Cancelar</button>

              <button class="btn btn-warning" v-on:click="agregarAlumnos(id_nombres)">Agregar</button>
                  
              <button class="btn btn-info"><a href="asig" style="color: white">Siguiente</a></button></center>
              
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
	<script src="js/alumnos/alumnos.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/jquery.min.js"></script>
@endpush