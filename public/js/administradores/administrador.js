var route = document.querySelector("[name=route]").value;
var admin='http://localhost/Catesismo/public/';
var urlAdmin=admin + '/apiAdmin';
new Vue({
	el:'#adminis',
	// token
	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		administradores:[],
		nick:'',
		password:'',
		nombre:'',
		apellidos:'',
		id_rol:2,
		active:'Usuario',
		buscar:'',
		
	},

	created:function(){
		this.getAdmin();
		this.getBuscar();
	},


	methods:{
		getAdmin:function(){
			this.$http.get(urlAdmin)
			.then(function(json){
				this.administradores=json.data
			});
		},

		getBuscar:function(){
			this.$http.get(urlAdmin)
			.then(function(json){
				this.administradores=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},

		guardarAdmin:function(id){
			this.$http.get(urlAdmin + '/' + id)
			.then(function(json){
				this.nick=json.data.nick;
				this.password=json.data.password;
				this.nombre=json.data.nombre;
				this.apellidos=json.data.apellidos;
				this.id_rol=json.data.id_rol;
				this.active=json.data.active
			});
		},

		eliminarAdmin:function(id){
			var resp=confirm("¿Estas Seguro Que Deseas Eliminar?")
			if(resp==true)
			{
				this.$http.delete(urlAdmin + '/' + id)
				.then(function(json){
				this.getAdmin();
				});
			}
			
		},

		cancelarAdmin:function(){

			var resp=confirm("¿Estas Seguro Que Deseas Cancelar?")
			if(resp==true)
			{

				this.nick='';
				this.password='';
				this.nombre='';
				this.apellidos='';
				this.id_rol='';
				this.active='';

			}

		},

		agregarAdmin:function(){
			var admin={
				nick:this.nick,
				password:this.password,
				nombre:this.nombre,
				apellidos:this.apellidos,
				id_rol:this.id_rol,
				active:this.active
			};

				this.nick='';
				this.password='';
				this.nombre='';
				this.apellidos='';
				this.id_rol=2;
				this.active='Usuario';

			this.$http.post(urlAdmin,admin)
			.then(function(response){
				this.getAdmin();
				alert('Se Ha Agregado Con Exito');
			});

		},

		actualizarAdmin:function(id){
			// crear un json 
			var admin={
				nick:this.nick,
				password:this.password,
				nombre:this.nombre,
				apellidos:this.apellidos,
				id_rol:this.id_rol,
				active:this.active
					  }
		    console.log();

			this.$http.patch(urlAdmin + '/' + id,admin)
			.then(function(json){
				this.getAdmin();
				this.limpiar();
			})
		},

		limpiar:function(){
				this.nick='';
				this.password='';
				this.nombre='';
				this.apellidos='';
				this.id_rol='';
				this.active='';
			
		}

	},

	computed:{
		filtroAdmin:function(){
			return this.administradores.filter((admin)=>{
				return admin.apellidos.match(this.buscar.trim()) ||
					admin.nombre.toLowerCase()
					.match(this.buscar.trim().toLowerCase());
			});
		},
	},
});

