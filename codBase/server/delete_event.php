<?php

require_once "conexion.php";

if(!$conexion->error){
	session_start();
	if (isset($_SESSION['agendaID'])){

		$id=$_POST["id"];

		$borrar= mysqli_query($conexion, "DELETE FROM eventos where id = $id");

		$php_response["msg"] = "OK";
		

	}else{
		$php_response["msg"] = "La sesión ha caducado";
	}
}else {
	$php_response["msg"] = "No se pudo conectar con el servidor";

}

echo json_encode($php_response);



 ?>
