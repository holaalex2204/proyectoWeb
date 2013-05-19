<?php
	include("dao/DataConnection.class.php");
	include("dao/config.php");
	function insertaUsuario($nombre,  $apellidos, $tel, $direccion, $mail, $nickname, $pass)
	{
		$conn = new DataConnection($url, $usuario, $password);
		$qry = "INSERT INTO ".$db.".cliente  (correo, nombre, app, pass, telefono, direccion, nickname) VALUE ('".$mail."','".$nombre."','".$apellidos."','".$pass."','".$tel."','".$direccion."','".$nickname."',);";
		return $result = $conn->getDB($qry);
	}	
?>