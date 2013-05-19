<?php
	$url = "localhost";
	$usuario = "root";
	$password = "root";
	$db = "rentalcar";
	function insertaUsuario($nombre,  $apellidos, $tel, $direccion, $mail, $nickname, $pass)
	{
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $user, $pass);
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
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $user, $pass);
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
	function insertaModelo($modelo, $year,$capPer,$ren,$cat,$foto,$precio)
	{
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $user, $pass);
			$qry = "INSERT INTO ".$db.".cliente  (nombre, year, capacidadPersonas, rendimiento, categoria, foto, precioDia) VALUE ('".$modelo."',".$year.",".$capPer.",".$ren.",'".$cat."','".$foto."');";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function insertaCarro($noserie, $idmodelo, $transmision){}
?>