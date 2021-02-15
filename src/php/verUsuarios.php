<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');

include("conexion.php");

$axiosData = json_decode(file_get_contents('php://input'));
$opcion = $axiosData->opcion;

switch ($opcion) {
	case 1:
		$email = $axiosData->email;
		$pass = $axiosData->pass;
		$query=mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE email='$email'");
		$rta = mysqli_fetch_array($query);
		$iguales = password_verify($pass, $rta[3]);
		if ($iguales){
			echo "TRUE";
		}else{
			echo "FALSE";
		}

		break;
	
	default:
		# code...
		break;
}


// echo $opcion." | ".$email." | ".$pass;
?>


