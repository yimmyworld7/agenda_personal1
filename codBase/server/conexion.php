<?php
  
  $servidor = "localhost";
  $usuarioSevidor="root";
  $passwordServidor= "";
  
  $base="agenda";
  $conexion = new mysqli($servidor, $usuarioSevidor, $passwordServidor);

  if (!$conexion->error){
    mysqli_query ($conexion,  "CREATE DATABASE IF NOT EXISTS agenda;");
    mysqli_select_db($conexion, $base);
    mysqli_query($conexion, "CREATE TABLE IF NOT EXISTS usuarios ( id integer primary key AUTO_INCREMENT  , 
                 nombre varchar (50),
                 email varchar (20) not null unique,
                 password varchar(250), 
                 fecha_naci  date);
                ");

    mysqli_query($conexion, "CREATE TABLE IF NOT EXISTS eventos ( id integer primary key AUTO_INCREMENT  , 
                 titulo varchar (20) not null unique,
                 fecha_inicio date,
                 hora_inicio  time, 
                 fecha_fin  date, 
                 hora_fin time,
                 dia_compl boolean,
                 fk_usuario integer);
                ");
    
    $conexion = new mysqli($servidor, $usuarioSevidor, $passwordServidor, $base);
    $php_response["msg"] = "OK";
    

  }else{
    echo  $php_response["msg"] ="Error al tratar de acceder al servidor ";
  }


?>