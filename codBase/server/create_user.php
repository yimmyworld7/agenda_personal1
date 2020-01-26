<?php

require_once "conexion.php";
if ($php_response["msg"]=="OK"){
	$u_exiten = mysqli_query($conexion, "SELECT * FROM usuarios");
	if (mysqli_num_rows($u_exiten) > 0 ){
		$php_response['obser']= "los usaurios ya existen ";
	
	}else{

		$nombre="Julio Jaramillo";
		$email = "july@hotmail.com";
		$psw =md5("12345");
		$fecha_naci = "1982/11/16";
		$crear = $conexion->prepare("INSERT INTO usuarios (nombre, email, psw, fecha_naci) VALUES (?,?,?,?)"); 
		$crear->bind_param("ssss", $nombre, $email, $psw, $fecha_naci);
		$crear->execute();

		$nombre="Pedro Perez";
		$email = "pedro@gmail.com";
		$psw =md5("12345");
		$fecha_naci = "2000/12/21";
		$crear->bind_param("ssss", $nombre, $email, $psw, $fecha_naci);
		$crear->execute();

		$nombre="Martha Riaño";
		$email = "martha@gmail.com";
		$psw =md5("12345");
		$fecha_naci = "2002/11/21";
		$crear->bind_param("ssss", $nombre, $email, $psw, $fecha_naci);
		$crear->execute();

	}	
	$cumple = date('Y/m/d',strtotime("1982/07/08"));
	

}