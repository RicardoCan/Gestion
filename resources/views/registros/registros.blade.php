@extends('layouts.master')
@section('titulo',' Registro De Administradores')
@section('contenido')

<div id="adminis" class="container">

<div class="container">
  <div class="row">
    <div class="col-3">

    </div>
    <div class="col-5" >

        <center><h1 style="color: white">Registro</h1></center>

        <center><img src="Img\753210.svg" width="200" height="200"></center>

        <br>
        <b></b>

        <input type="text" placeholder="Escriba Nombre De Usuario" v-model="nick" class="form-control">
        <br> 
        <input type="password" placeholder="Escriba Contraseña" v-model="password" class="form-control">
        <br> 
        <input type="text" placeholder="Escriba Nombres" v-model="nombre" class="form-control">
        <br>  
        <input type="text" placeholder="Escriba Apellidos" v-model="apellidos" class="form-control">

       <br>

       <div class="container">
          <div class="row">
           <div class="col-12">


              <center> <button class="btn btn-warning" v-on:click="agregarAdmin(nick)">Agregar</button></center>

              <br>

              <center><button class="btn btn-success"><a href="logout" style="color: black">Inicio De Sesion</a></button></center>
           
                 
              
          </div>

        </div> 

      </div>


      </div> 
        <div class="col-3">
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
@endpush

