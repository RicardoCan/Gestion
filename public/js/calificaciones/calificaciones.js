var route = document.querySelector("[name=route]").value;
var calificacion='http://localhost/Catesismo/public/';
var urlCalificacion=calificacion + '/apiCalificaciones';
new Vue({
	el:'#calificacion',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		calificaciones:[],
		id_nombre:'',
		apellidos:'',
		tareas_completas:'',
		tareas_estandar:12,
		tareas_atrasadas:'',
		aprobado:'',
		buscar:''
		
	},

	created:function(){
		this.getCalificaciones();
		this.getBuscar();
	},


	methods:{
		getCalificaciones:function(){
			this.$http.get(urlCalificacion)
			.then(function(json){
				this.calificaciones=json.data
			});
		},

		getBuscar:function(){
			this.$http.get(urlCalificacion)
			.then(function(json){
				this.calificaciones=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},

		guardarCalificaciones:function(id){
			this.$http.get(urlCalificacion + '/' + id)
			.then(function(json){
				this.id_nombre=json.data.id_nombre;
				this.apellidos=json.data.apellidos;
				this.tareas_completas=json.data.tareas_completas;
				this.tareas_estandar=json.data.tareas_estandar;
				this.tareas_atrasadas=json.data.tareas_atrasadas;
				this.aprobado=json.data.aprobado;
				
			});
		},

		eliminarCalificaciones:function(id){
			var resp=confirm("¿Estas Seguro Que Deseas Eliminar?")
			if(resp==true)
			{
				this.$http.delete(urlCalificacion + '/' + id)
				.then(function(json){
				this.getCalificaciones();
				});
			}
			
		},

		cancelarCalificaciones:function(){

			var resp=confirm("¿Estas Seguro Que Deseas Cancelar?")
			if(resp==true)
			{

				this.id_nombre='';
				this.apellidos='';
				this.tareas_completas='';
				this.tareas_estandar=12;
				this.tareas_atrasadas='';
				this.aprobado='';
				
			}

		},

		agregarCalificaciones:function(){
			var calificacion={
				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				tareas_completas:this.tareas_completas,
				tareas_estandar:this.tareas_estandar,
				tareas_atrasadas:this.tareas_atrasadas,
				aprobado:this.aprobado,
			};

			this.id_nombre='';
			this.apellidos='';
			this.tareas_completas='';
			this.tareas_estandar='';
			this.tareas_atrasadas='';
			this.aprobado='';
		
			this.$http.post(urlCalificacion,calificacion)
			.then(function(response){
				this.getCalificaciones();
			});

		},

		actualizarCalificaciones:function(id){
			// crear un json 
			var calificacion={
				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				tareas_completas:this.tareas_completas,
				tareas_estandar:this.tareas_estandar,
				tareas_atrasadas:this.tareas_atrasadas,
				aprobado:this.aprobado,
					  }
		    console.log();

			this.$http.patch(urlCalificacion + '/' + id,calificacion)
			.then(function(json){
				this.getCalificaciones();
				this.limpiar();
			})
		},

		limpiar:function(){
			this.id_nombre='';
			this.apellidos='';
			this.tareas_completas='';
			this.tareas_estandar=12;
			this.tareas_atrasadas='';
			this.aprobado='';
			
		}

	},

	computed:{
		filtroCalificaciones:function(){
			return this.calificaciones.filter((calif)=>{
				return calif.id_nombre.match(this.buscar.trim()) ||
					calif.id_nombre.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},
});

