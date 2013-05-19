<?php
	$url = "localhost";
	$usuario = "root";
	$password = "root";
	$db = "rentalcar";
	function insertaUsuario($nombre,  $apellidos, $tel, $direccion, $mail, $nickname, $pass)
	{
		try {
			$conn = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
			$qry = "INSERT INTO ".$db.".cliente  (correo, nombre, app, pass, telefono, direccion, nickname) VALUE ('".$mail."','".$nombre."','".$apellidos."','".$pass."','".$tel."','".$direccion."','".$nickname."');";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}	
	function existeUsuario($nickname, $pass)
	{
		try {
			$conn = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
			$qry = "SELECT id from ".$db.".cliente  where   ".$db.".cliente.nickname LIKE CONCAT('%',".$nickname.",'%') and   ".$db.".cliente.pass  LIKE CONCAT('%',".$pass.",'%');";
			foreach ($conn->query($qry) as $row) 
			{
        				return $row['id'];
			}
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
?>