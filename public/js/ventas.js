var urlProd='http://localhost/Gestion/public/prod';
var urlVenta='http://localhost/Gestion/public/apiventa';

function init()
{
new Vue({
	http: {
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el:'#ventas',

	created:function(){

		this.foliarVenta();

	},

	data:{
		nombre:'Hola',
		productos:[],
		ventas:[],
		codigo:'',
		pago:0,
		tot:0,
		folio:'',

		cantidades:[1,1,1,1,1,1,1,1,1,1], //almacenar un conjunto de cantidades
		fecha_venta:moment().format('YYYY-MM-DD'),
	},

	methods:{
		getProducto:function(){
			this.$http.get(urlProd + '/' + this.codigo)
			.then(function(json){
			var venta={'id_producto':json.data.id_producto,
			'nombre':json.data.nombre,
			'precio':json.data.precio,
			'cantidad':1,
			'total':json.data.precio
			}
			if(venta.id_producto)
			this.ventas.push(venta);
			this.codigo='';
			this.$refs.buscar.focus()
			})
		}, //fin de getproducto

		eliminarProducto:function(id){
			this.ventas.splice(id,1);
		},
		

		foliarVenta:function(){
			this.folio='VTA-' + moment().format('YYMMDDhmmss');
		},

		vender:function(){

			var detalles2=[];
			for (var i = 0; i < this.ventas.length; i++) {
				detalles2.push({
					id_producto:this.ventas[i].id_producto,
					precio:this.ventas[i].precio,
					cantidad:this.cantidades[i],
					total:this.ventas[i].precio * this.cantidades[i]
				})
			}

			//console.log(detalles2);

			var unaVenta = {
				folio:this.folio,
				// id_vendedor:'tito',
				fecha_venta:this.fecha_venta,
				total:this.tot,
				detalles:detalles2
			}

			console.log(unaVenta);

			this.$http.post(urlVenta,unaVenta)
			.then(function(json){
				console.log(json.data);
			}).catch(function(j){
				console.log(j.data);
			});
			// this.sku='';
			// this.nombre='';
			// this.precio='';
			// this.cantidad='';
			// this.total='';
			alert('Venta guardada con éxito!!!!');
			this.foliarVenta();
			this.ventas=[];
			this.cantidades=[1,1,1,1,1,1,1,1,1,1];
		}
		//fin de vender
	},
	//fin de methosd

	computed:{
		total:function(){

			var sum=0;
			for (var i = 0; i < this.ventas.length; i++) {
				sum=sum + (this.cantidades[i]*this.ventas[i].precio);
			}
			this.tot=sum;
			return sum;
		},
		cambio:function(){
			return this.pago - this.tot;
		},

		totalProd(){
			return (id)=>{
				var total=0;
				if (this.cantidades[id]!=null)
					total=this.cantidades[id]*this.ventas[id].precio;
				return total.toFixed(1);
			}
		}
	}

});

}

window.onload=init;
