<?php

require_once "conexion.php";

if(!$conexion->error){
	session_start();
	if(isset($_SESSION['agendaID'])){

		$id = $_POST['id'];
		$fecha_inicio = date("y-m-d",strtotime($_POST['start_date']));
		$hora_inicio = date("h:i:s",strtotime($_POST['start_hour']));
		$fecha_fin = date("y-m-d",strtotime($_POST['end_date']));
		$hora_fin = date("h:i:s",strtotime($_POST['end_hour']));

		$add_evento = mysqli_query($conexion, "UPDATE eventos SET fecha_inicio = '$fecha_inicio', hora_inicio = '$hora_inicio', fecha_fin = '$fecha_fin', hora_fin = '$hora_fin' WHERE id = $id");

		$php_response["msg"]="OK";
	}else{
		$php_response['msg']= "La sesión ha caducado.";
	}
}else{
	$php_response['msg']= "No se pudo conectar al servidor";
}

echo json_encode($php_response);
 


 ?>
