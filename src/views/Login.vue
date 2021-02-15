<template>
	<div>
		<div class="grid grid-cols-3 w-2/3 bg-green-200 m-auto">
			<h1 class="col-span-3 text-2xl p-5">Login</h1>
			<label>Email: </label><input type="text" v-model="email" class="col-span-2 m-3">
			<label>Password: </label><input type="text" v-model="passw" class="col-span-2 m-3">
			<button class="col-start-2 m-5 bg-green-600 text-white" @click="go">Ingresar</button>
		</div>
	</div>
</template>

<script>

	import axios from 'axios';

	export default{
		name: "Login",
		data(){
			return{
				email : "",
				passw: ""
			}
		},
		methods:{
			async go(){

				axios.post('http://localhost/Vue.js/miniCurso/Vue-CLI/php-vue/src/php/verUsuarios.php',{
					opcion: 1,
					email: this.email,
					pass: this.passw
				})
					.then(function (response) {
						console.log(response.data);
  					})
			}
		}
	}

</script>