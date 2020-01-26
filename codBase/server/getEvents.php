<?php
	require_once "conexion.php";
	if (!$conexion->error){
		session_start();
		if (!$_SESSION['agendaID']){
			$php_response['msg']= "La sesion a caducado ";

		}else{
			$id = $_SESSION['agendaID'];
	  	
	  		
			$consulta = "SELECT * FROM eventos WHERE fk_usuario = '$id'" ;
			if ($resultado = mysqli_query($conexion, $consulta)) {
			    $i = 0;
			    while($obj = $resultado->fetch_assoc()){

			    	$php_response['eventos'][$i]['id']= $obj['id'];
			    	$php_response['eventos'][$i]['title']= $obj['titulo'];

			    	if ($obj['dia_compl']== 0) {
			    		$dia_completo = false;
			    		$php_response['eventos'][$i]['start'] = $obj['fecha_inicio'].' '.$obj['hora_inicio'];
			    		$php_response['eventos'][$i]['end'] = $obj['fecha_fin'].' '.$obj['hora_fin'];
			    	} else {
			    		$dia_completo = true;
			    		$php_response['eventos'][$i]['start'] = $obj['fecha_inicio'];
			    		$php_response['eventos'][$i]['end'] = "";
			    	}

			    	$php_response['eventos'][$i]['allDay'] = $dia_completo;
			    	$i++;
			    }
			    
			    $php_response['msg']= "OK";
			}

		}

	}else{
		$php_response['msg']= "Error de conexion al servidor" ;
	}
	echo json_encode($php_response);

 ?>
