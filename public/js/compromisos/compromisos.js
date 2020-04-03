var route = document.querySelector("[name=route]").value;
var compromiso='http://localhost/Catesismo/public/';
var urlCompromisos=compromiso + '/apiCompromisos';
new Vue({
	el:'#compromiso',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		x:[],
		id_nombre:'',
		apellidos:'',
		accion:'',
		fecha_programada:'',
		hora:'',
		buscar:'',
		
	},

	created:function(){
		this.getCompromiso();
		this.getBuscar();
	},


	methods:{
		getCompromiso:function(){
			this.$http.get(urlCompromisos)
			.then(function(json){
				this.x=json.data
			});
		},

		getBuscar:function(){
			this.$http.get(urlCompromisos)
			.then(function(json){
				this.x=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},

		guardarCompromiso:function(id){
			this.$http.get(urlCompromisos + '/' + id)
			.then(function(json){
				this.id_nombre=json.data.id_nombre;
				this.apellidos=json.data.apellidos;
				this.accion=json.data.accion;
				this.fecha_programada=json.data.fecha_programada;
				this.hora=json.data.hora;
			});
		},

		eliminarCompromiso:function(id){
			var resp=confirm("¿Estas Seguro Que Deseas Eliminar?")
			if(resp==true)
			{
				this.$http.delete(urlCompromisos + '/' + id)
				.then(function(json){
				this.getCompromiso();
				});
			}
			
		},

		cancelarCompromiso:function(){

			var resp=confirm("¿Estas Seguro Que Deseas Cancelar?")
			if(resp==true)
			{

				this.id_nombre='';
				this.apellidos='';
				this.accion='';
				this.fecha_programada='';
				this.hora='';

			}

		},

		agregarCompromiso:function(){
			var compromiso={

				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				accion:this.accion,
				fecha_programada:this.fecha_programada,
				hora:this.hora
			};

			this.id_nombre='';
			this.apellidos='';
			this.accion='';
			this.fecha_programada='';
			this.hora='';

			this.$http.post(urlCompromisos,compromiso)
			.then(function(response){
				this.getCompromiso();
			});

		},

		actualizarCompromiso:function(id){
			// crear un json 
			var compromiso={
				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				accion:this.accion,
				fecha_programada:this.fecha_programada,
				hora:this.hora
					  }
		    console.log();

			this.$http.patch(urlCompromisos + '/' + id,compromiso)
			.then(function(json){
				this.getCompromiso();
				this.limpiar();
			})
		},

		limpiar:function(){
			this.id_nombre='';
			this.apellidos='';
			this.accion='';
			this.fecha_programada='';
			this.hora='';
		}

	},

	computed:{
		filtroCompromiso:function(){
			return this.x.filter((comp)=>{
				return comp.id_nombre.match(this.buscar.trim()) || 
					comp.apellidos.toLowerCase() 
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},
});

