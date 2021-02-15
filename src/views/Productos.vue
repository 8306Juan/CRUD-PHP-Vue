<template>
  <div>
    <div class="bg-gray-200 grid grid-cols-8 w-3/4 m-auto mb-5">
    	<label>ID</label>
    	<label class="col-span-2">NOMBRE</label>
    	<label class="col-span-2">MARCA</label>
    	<label class="col-span-2">PRECIO</label>
    </div>
    <div v-for="(prod, idx) of arrayProds" :key="prod.id" class="bg-gray-200 grid grid-cols-8 w-3/4 m-auto mb-2 p-1">
    	<label>{{prod.id}}</label>
    	<label class="col-span-2">{{prod.nombre}}</label>
    	<label class="col-span-2">{{prod.marca}}</label>
    	<label class="col-span-2">${{prod.precio}}</label>
    	<button class="bg-red-500 text-white sm:w-1/2 m-auto p-px rounded-lg" @click="eliminar(prod.id, idx)">Eliminar</button>
    </div>
  </div>
</template>

<script>

	import axios from 'axios';

	export default{
		name: "Productos",
		data(){
			return{
				arrayProds:{id: 0, nombre: 'Oh, raios. Parese que algo salio mal al Cargar los Productos', marca: 0, precio: 0},

				urlPHP: "http://localhost/Vue.js/miniCurso/Vue-CLI/php-vue/src/php/listaProds.php"
				
			}
		},
		methods:{
			eliminar(idP, idx){
				let confirmacion = prompt("¿Estas Seguro? Esta Accion NO se puede revertir \n -S = Eliminar \n -N = Cancelar");
				if (confirmacion == "S"){
					axios.post(this.urlPHP,{
						opcion: 'eliminar',
						idP: idP
					})
						.then((function (response) {

							alert(response.data);
							this.arrayProds.splice(idx, 1);

	  					}).bind(this));
					}else{
						console.log("Accion Cancelada!");
					}
				
			}
		},
		mounted(){
				let rta;
				
				axios.post(this.urlPHP,{
					opcion: 1
				})
					.then((function (response) {

						this.arrayProds = response.data;
  					}).bind(this));
				
		}
	}

</script>