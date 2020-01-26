<?php

require_once "conexion.php";
if(!$conexion->error){
	session_start();
	if(isset($_SESSION['agendaID'])){
		
		$response['msj']="true";

		$titulo = "'".$_POST['titulo']."'";
		$fecha_inicio = "'".$_POST['start_date']."'";
		$hora_inicio = "'".$_POST['start_hour']."'";
		$fecha_fin = "'".$_POST['end_date']."'";
		$hora_fin = "'".$_POST['end_hour']."'";
		$dia_compl	= "'".$_POST['allDay']."'";
		$fk_usuario = "'".$_SESSION['agendaID']."'";

	
	if ($add_evento = mysqli_query($conexion, "INSERT INTO eventos (titulo, fecha_inicio, hora_inicio, fecha_fin, hora_fin, dia_compl, fk_usuario) VALUES ($titulo, $fecha_inicio, $hora_inicio, $fecha_fin, $hora_fin, $dia_compl, $fk_usuario)")){

		$php_response['msg']= "OK";

		} else {
		$php_response['msg']= "Error al insertar datos".mysqli_error($conexion);
		}
	}else {
		$php_response["msg"]="La sesion a caducado";

	}
}else{

	$php_response["msg"]="No se pudo conectar con el servidor";

}

echo json_encode($php_response);

$conexion->close();


?>