var route = document.querySelector("[name=route]").value;
var clase='http://localhost/Catesismo/public/';
var urlClases=clase + '/apiClases';
new Vue({
	el:'#clase',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		clases:[],
		id_nombre:'',
		apellidos:'',
		dia_clase:'',
		nombre_lugar:'',
		hora:'',
		buscar:''
		
	},

	created:function(){
		this.getClases();
		this.getBuscar();
	},


	methods:{
		getClases:function(){
			this.$http.get(urlClases)
			.then(function(json){
				this.clases=json.data
			});
		},

		getBuscar:function(){
			this.$http.get(urlClases)
			.then(function(json){
				this.clases=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},

		guardarClases:function(id){
			this.$http.get(urlClases + '/' + id)
			.then(function(json){
				this.id_nombre=json.data.id_nombre;
				this.apellidos=json.data.apellidos;
				this.dia_clase=json.data.dia_clase;
				this.nombre_lugar=json.data.nombre_lugar;
				this.hora=json.data.hora;
				
			});
		},

		eliminarClases:function(id){
			var resp=confirm("¿Estas Seguro Que Deseas Eliminar?")
			if(resp==true)
			{
				this.$http.delete(urlClases + '/' + id)
				.then(function(json){
				this.getClases();
				});
			}
			
		},

		cancelarClases:function(){

			var resp=confirm("¿Estas Seguro Que Deseas Cancelar?")
			if(resp==true)
			{

				this.id_nombre='';
				this.apellidos='';
				this.dia_clase='';
				this.nombre_lugar='';
				this.hora='';
				
			}

		},

		agregarClases:function(){
			var clase={
				id_nombre:this.id_nombre,
				apellidos:this.apellidos,
				dia_clase:this.dia_clase,
				nombre_lugar:this.nombre_lugar,
				hora:this.hora,
				
			};

			this.id_nombre='';
			this.apellidos='';
			this.dia_clase='';
			this.nombre_lugar='';
			this.hora='';
		
			this.$http.post(urlClases,clase)
			.then(function(response){
				this.getClases();
			});

		},

		actualizarClases:function(id){
			// crear un json 
			var clase={
					id_nombre:this.id_nombre,
					apellidos:this.apellidos,
					dia_clase:this.dia_clase,
					nombre_lugar:this.nombre_lugar,
					hora:this.hora,
					  }
		    console.log();

			this.$http.patch(urlClases + '/' + id,clase)
			.then(function(json){
				this.getClases();
				this.limpiar();
			})
		},

		limpiar:function(){
			this.id_nombre='';
			this.apellidos='';
			this.dia_clase='';
			this.nombre_lugar='';
			this.hora='';
		}

	},

	computed:{
		filtroClases:function(){
			return this.clases.filter((clas)=>{
				return clas.id_nombre.match(this.buscar.trim()) ||
					clas.id_nombre.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},
});
