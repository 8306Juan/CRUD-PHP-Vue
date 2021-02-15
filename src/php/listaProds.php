<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');

include("conexion.php");

$axiosData = json_decode(file_get_contents('php://input'));
$opcion = $axiosData->opcion;
$arrayRta = array();

switch ($opcion) {
	case 1:
		$query=mysqli_query($conexion,"SELECT * FROM `productos`");

		while ($rta = mysqli_fetch_object($query)){

			$arrayRta[]=$rta;
		}

		echo json_encode($arrayRta);

		break;

	case 'agregar':

				$query=mysqli_query($conexion,"INSERT INTO `productos` VALUES(DEFAULT,'$axiosData->nombre', '$axiosData->marca', '$axiosData->precio')");
				if ($query){
					echo "Producto Agregado de manera Exitosa!";
				}else{
					echo "Parece que el producto ya existe!";
				}

		break;
	
	default:
		# code...
		break;
}


?>