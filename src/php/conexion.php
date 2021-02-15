<?php 

@$conexion = mysqli_connect("localhost", "root", "", "vuePhp");

if (mysqli_connect_error()) {
	echo "Error al Conectarse a la DB";
}

?>