<?php  

include('conector.php');

$data['id'] = "";
$data['nombre'] = "Rosa Cardenas";
$data['email'] = "rosa@gmail.com";
$data['psw'] = password_hash("12345", PASSWORD_DEFAULT);
$data['fecha_naci'] = "2000-05-30";

$con = new ConectorBD('localhost', 'root', '');

$response['conexion']=$con->initConexion('agenda');

if ($response['conexion']=='OK'){
	if($con->insertData('usuarios', $data)){
		$response['msg']= "exito en la inserción";
	}else {
		$response['msg']= "Hubo un error y los datos no han sido cargados";
	}


}else {
	$response['msg']= "No se pudo conectar a la base de datos";
}

echo json_encode($response);

?>