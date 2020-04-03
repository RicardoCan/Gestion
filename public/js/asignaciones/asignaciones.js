var route = document.querySelector("[name=route]").value;
var asignacion='http://localhost/Catesismo/public/';
var urlAsignaciones=asignacion + '/apiAsignaciones';
new Vue({
	el:'#asignacion',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		asignaciones:[],
		id_nombre:'',
		apellidos:'',
		edad:'',
		cargo:'',
		activo:'',
		buscar:'',
		
	},

	created:function(){
		this.getAsignacion();
		this.getBuscar();
	},


	methods:{
		getAsignacion:function(){
			this.$http.get(urlAsignaciones)
			.then(function(json){
				this.asignaciones=json.data
			});
		},

		getBuscar:function(){
			this.$http.get(urlAsignaciones)
			.then(function(json){
				this.asignaciones=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},

		guardarAsignacion:function(id){
			this.$http.get(urlAsignaciones + '/' + id)
			.then(function(json){
				this.id_nombre=json.data.id_nombre;
				this.apellidos=json.data.apellidos;
				this.edad=json.data.edad;
				this.cargo=json.data.cargo;
				this.activo=json.data.activo;
			});
		},

		eliminarAsignacion:function(id){
			var resp=confirm("¿Estas Seguro Que Deseas Eliminar?")
			if(resp==true)
			{
				this.$http.delete(urlAsignaciones + '/' + id)
				.then(function(json){
				this.getAsignacion();
				});
			}
			
		},

		cancelarAsignacion:function(){

			var resp=confirm("¿Estas Seguro Que Deseas Cancelar?")
			if(resp==true)
			{

				this.id_nombre='';
				this.apellidos='';
				this.edad='';
				this.cargo='',
				this.activo='';

			}

		},

		agregarAsignacion:function(){
			var asignacion={
				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				edad:this.edad,
				cargo:this.cargo,
				activo:this.activo
			};

			this.id_nombre='';
			this.apellidos='';
			this.edad='';
			this.cargo='',
			this.activo='';

			this.$http.post(urlAsignaciones,asignacion)
			.then(function(response){
				this.getAsignacion();
			});

		},

		actualizarAsignacion:function(id){
			// crear un json 
			var asignacion={
				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				edad:this.edad,
				cargo:this.cargo,
				activo:this.activo
					  }
		    console.log();

			this.$http.patch(urlAsignaciones + '/' + id,asignacion)
			.then(function(json){
				this.getAsignacion();
				this.limpiar();
			})
		},

		limpiar:function(){
			this.id_nombre='';
			this.apellidos='';
			this.edad='';
			this.cargo='';
			this.activo='';
			
		}

	},

	computed:{
		filtroAsignacion:function(){
			return this.asignaciones.filter((asig)=>{
				return asig.id_nombre.match(this.buscar.trim())||
					asig.apellidos.toLowerCase() 
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},
});

