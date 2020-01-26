<?php

class ConectorBD{
	private $host ='localhost';
	private $user ='root';
	private $password ='';
	private $conexion;

	function initConexion($nombre_db){
		$this->conexion= new mysqli($this->host, $this->user, $this->password, $nombre_db);
		if($this->conexion->connect_error){
			return "Error:" .$this->conexion->connect_error;
		}else{
			return "OK";
		}
	}

	function ejecutarQuery($query){
		return $this->conexion->query($query);
	}

	function cerrarConexion(){
		$this->conexion->Close();
	}

	function insertarRegistro($tabla, $datos){
		$sqlInsert= 'INSERT INTO '.$tabla;
		$sqlCampo = ' (';
		$sqlValor = ') VALUES (';
		$contador = 1;
		foreach($datos as $indice=>$value){
			$sqlCampo .=$indice;
			$sqlValor .='"'.$value.'"';
			if($contador !=count($datos)){
				$sqlCampo .=', ';
				$sqlValor .=', ';
			}else{
			$sqlValor .=');';	
			}

			$contador += 1;
		}

		$sqlInsert .=$sqlCampo.$sqlValor;
		return $this->conexion->query($sqlInsert);
	}


	function getConexion(){
		return $this->conexion;
	}


} 


 ?>