var route = document.querySelector("[name=route]").value;
var alumno ='http://localhost/Catesismo/public/';
var urlAlumno = alumno + '/apiAlumnos';
new Vue({
	el:'#alumno',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		alumnos:[],
		id_nombres:'',
		apellidos:'',
		edad:'',
		grupo:'',
		encargado:'',
		activo:'',
		buscar:''
		
	},

	created:function(){
		this.getAlumnos();
		this.getBuscar();
	},


	methods:{
		getAlumnos:function(){
			this.$http.get(urlAlumno)
			.then(function(json){
				this.alumnos=json.data
			});
		},

		getBuscar:function(){
			this.$http.get(urlAlumno)
			.then(function(json){
				this.alumnos=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},

		guardarAlumnos:function(id){
			this.$http.get(urlAlumno + '/' + id)
			.then(function(json){
				this.id_nombres=json.data.id_nombres;
				this.apellidos=json.data.apellidos;
				this.edad=json.data.edad;
				this.grupo=json.data.grupo;
				this.encargado=json.data.encargado;
				this.activo=json.data.activo;
			});
		},

		eliminarAlumnos:function(id){
			var resp=confirm("¿Estas Seguro Que Deseas Eliminar?")
			if(resp==true)
			{
				this.$http.delete(urlAlumno + '/' + id)
				.then(function(json){
				this.getAlumnos();
				});
			}
			
		},

		cancelarAlumnos:function(){

			var resp=confirm("¿Estas Seguro Que Deseas Cancelar?")
			if(resp==true)
			{

				this.id_nombres='';
				this.apellidos='';
				this.edad='';
				this.grupo='';
				this.encargado='';
				this.activo='';

			}

		},

		agregarAlumnos:function(){
			var alumno={
				id_nombres:this.id_nombres,
				apellidos:this.apellidos,
				edad:this.edad,
				grupo:this.grupo,
				encargado:this.encargado,
				activo:this.activo
			};

			this.id_nombres='';
			this.apellidos='';
			this.edad='';
			this.grupo='';
			this.encargado='';
			this.activo='';

			this.$http.post(urlAlumno,alumno)
			.then(function(response){
				this.getAlumnos();
			});

		},

		actualizarAlumnos:function(id){
			// crear un json 
			var alumno={
				id_nombres:this.id_nombres,
				apellidos:this.apellidos,
				edad:this.edad,
				grupo:this.grupo,
				encargado:this.encargado,
				activo:this.activo
					  }
		    console.log();

			this.$http.patch(urlAlumno + '/' + id,alumno)
			.then(function(json){
				this.getAlumnos();
				this.limpiar();
			})
		},

		limpiar:function(){
			this.id_nombres='';
			this.apellidos='';
			this.edad='';
			this.grupo='';
			this.encargado='';
			this.activo='';
			
		}

	},

	computed:{
		filtroAlumnos:function(){
			return this.alumnos.filter((alum)=>{
				return alum.id_nombres.match(this.buscar.trim())||
					alum.encargado.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},
});

