@extends('layouts.layout')
@section('titulo','Clases')
@section('contenido')

<div id="clase" class="container">

  <center><h1 style="color: white">Lista De Clases</h1></center>

  <div class="container">
    <div class="row">
     <div class="col-10">

      <input type="text" placeholder="Buscar" v-model="buscar" class="form-control">

       <br>

      <div class="container">
        <div class="row">
          <div class="col-md-6">

          <button class="btn btn-secondary"><a href="admin" style="color: white">Ingresar Lista De Administradores</a></button>

          <a href="{{url('imprimir4')}}" target="_black"><button class="btn btn-success">Generar PDF</button></a>

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
              <th><center>Dia De Impartición</center></th>
              <th><center>Nombre De Lugar</center></th>
              <th><center>Hora</center></th>
              <th><center>Opciones</center></th>
            </thead>

            <tbody>
              <tr v-for="(clase,index) in filtroClases" style="color: white" class="table-active">
                <td><center>@{{clase.id_nombre}}</center></td>
                <td><center>@{{clase.apellidos}}</center></td>
                <td><center>@{{clase.dia_clase}}<center></td>
                <td><center>@{{clase.nombre_lugar}}<center></td>
                <td><center>@{{clase.hora}}</center></td>
                <td>
                  
                  <center><span class="fas fa-pencil-alt btn btn-xs btn-primary" v-on:click="guardarClases(clase.id_nombre)"></span>

                  <span class="fas fa-trash btn btn-xs btn-danger" v-on:click="eliminarClases(clase.id_nombre)"></span></center>
                  
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
       
        <select class="form-control" v-model="dia_clase">
         <option>
           SABADO
         </option> 
         <option>
           DOMINGO
         </option>
        </select>

        <br>
       
        <select class="form-control" v-model="nombre_lugar">
         <option>
           CONVENTO
         </option> 
         <option>
           PASILLO
         </option>
         <option>
           ATRIO DE LA IGLECIA
         </option>
         <option>
           SALON
         </option>
        </select>

        <br>

        <input type="time" placeholder="Escriba Hora" v-model="hora" class="form-control">
        <br> 

        <div class="container">
          <div class="row">
           <div class="col clearfix">

              <center><button class="btn btn-primary" v-on:click="actualizarClases(id_nombre)">Guardar</button>

              <button class="btn btn-danger" v-on:click="cancelarClases()">Cancelar</button>

              <button class="btn btn-warning" v-on:click="agregarClases(id_nombre)">Agregar</button>

              <button class="btn btn-info"><a href="comp" style="color: white">Siguiente</a></button></center>
              
              <br>
              
              <div class="container">
                <div class="row">
                  <div class="col clearfix">

                     <center><button class="btn btn-dark"><a href="calif">Anterior</a></button></center>
                    
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
	<script src="js/clases/clases.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/jquery.min.js"></script>
@endpush