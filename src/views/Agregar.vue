<template>
	<div>
		<div class="bg-indigo-300 grid grid-cols-3 p-3 w-1/2 m-auto rounded-xl">
			<label><b>Nombre: </b></label><input type="text" class="col-span-2 bg-white mb-3 rounded-xl w-3/4 pl-4" v-model="nombre">

			<label><b>Marca: </b></label><input type="text" class="col-span-2 bg-white mb-3 rounded-xl w-3/4 pl-4" v-model="marca">

			<label><b>Precio: </b></label><input type="number" class="col-span-2 bg-white mb-3 rounded-xl w-3/4 pl-4" v-model="precio">

			<button @click="agregar" @keyup.enter="agregar" class="col-start-2 bg-green-300 rounded-2xl w-1/2 m-auto">Agregar</button>
		</div>
		<div class=" bg-yellow-500 mt-24 text-2xl w-1/2 p-3 m-auto rounded-2xl">{{respuesta}}</div>
	</div>
</template>

<script>
	

	export default{
		name: 'Agregar',
		data(){
			return{
				nombre: '',
				marca: '',
				precio: 0,
				respuesta: ''
			}
		},
		methods:{
			agregar(){

				let urlPHP = 'http://localhost/Vue.js/miniCurso/Vue-CLI/php-vue/src/php/listaProds.php';

				axios.post(urlPHP,{
					opcion: 'agregar',
					nombre: this.nombre,
					marca: this.marca,
					precio: this.precio
				})
					.then((function (response) {
						
						this.respuesta = response.data;

  					}).bind(this));  				
			}
		}
	}

</script>