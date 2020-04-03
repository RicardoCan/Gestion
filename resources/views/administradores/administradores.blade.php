@extends('layouts.layout')
@section('titulo','Administradores')
@section('contenido')

<div id="adminis" class="container">

  <center><h1 style="color: white">Administradores y Usuarios Registrados</h1></center>

  <div class="container">
    <div class="row">
     <div class="col-10">

      <input type="text" placeholder="Buscar" v-model="buscar" class="form-control">

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
              <th><center>Nombre De Usuario</center></th>
              <th><center>Contraseña</center></th>
              <th><center>Nombres</center></th>
              <th><center>Apellidos</center></th>
              <th><center>Estatus</center></th>
              <th><center>Rol</center></th>
              <th><center>Opciones</center></th>
            </thead>

            <tbody>
              <tr v-for="(admin,index) in filtroAdmin" style="color: white" class="table-active">
                <td><center>@{{admin.nick}}</center></td>
                <td><center>@{{admin.password}}</center></td>
                <td><center>@{{admin.nombre}}</center></td>
                <td><center>@{{admin.apellidos}}</center></td>
                <td><center>@{{admin.active}}</center></td>
                <td><center>@{{admin.id_rol}}</center></td>
                
                <td>
                  <center><span class="fas fa-pencil-alt btn btn-xs btn-primary" v-on:click="guardarAdmin(admin.nick)"></span>

                  <span class="fas fa-trash btn btn-xs btn-danger" v-on:click="eliminarAdmin(admin.nick)"></span></center>
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

        <input type="text" placeholder="Escriba Nombre De Usuario" v-model="nick" class="form-control">
        <br> 
        <input type="password" placeholder="Escriba Contraseña" v-model="password" class="form-control">
        <br> 
        <input type="text" placeholder="Escriba Nombres" v-model="nombre" class="form-control">
        <br>  
        <input type="text" placeholder="Escriba Apellidos" v-model="apellidos" class="form-control">

        <br>
        <select class="form-control" v-model="active">
         <option>
          Administrador
         </option> 
         <option>
          Usuario
         </option>
        </select>

        <br>

        <select class="form-control" v-model="id_rol">
         <option>
          1
         </option> 
         <option>
           2
         </option>
        </select>

        <br>

        <div class="container">
          <div class="row">
           <div class="col clearfix">

              <center><button class="btn btn-primary" v-on:click="actualizarAdmin(nick)">Guardar</button>

              <button class="btn btn-danger" v-on:click="cancelarAdmin()">Cancelar</button>

              <button class="btn btn-warning" v-on:click="agregarAdmin(nick)">Agregar</button></center>

                               
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
  <script src="js/administradores/administrador.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
@endpush