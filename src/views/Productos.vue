<template>
  <div>
    <div class="bg-gray-200 grid grid-cols-7 w-3/4 m-auto mb-5">
    	<label>ID</label>
    	<label class="col-span-2">NOMBRE</label>
    	<label class="col-span-2">MARCA</label>
    	<label class="col-span-2">PRECIO</label>
    </div>
    <div v-for="prod of arrayProds" :key="prod.id" class="bg-gray-200 grid grid-cols-7 w-3/4 m-auto mb-2 p-1">
    	<label>{{prod.id}}</label>
    	<label class="col-span-2">{{prod.nombre}}</label>
    	<label class="col-span-2">{{prod.marca}}</label>
    	<label class="col-span-2">${{prod.precio}}</label>
    </div>
  </div>
</template>

<script>

	import axios from 'axios';

	export default{
		name: "Productos",
		data(){
			return{
				arrayProds:['Oh, raios. Parese que algo salio mal al Cargar los Productos']
				
			}
		},
		created(){
				let rta;
				let urlPHP = "http://localhost/Vue.js/miniCurso/Vue-CLI/php-vue/src/php/listaProds.php";

				axios.post(urlPHP,{
					opcion: 1
				})
					.then((function (response) {

						this.arrayProds = response.data;
  					}).bind(this));
				
		}
	}

</script>