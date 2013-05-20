<?php
	header('Content-Type: text/html; charset=UTF-8');
	$url = "localhost";
	$usuario = "root";
	$password = "root";
	$db = "rentalcar";

	function insertaUsuario($nombre,  $apellidos, $tel, $direccion, $mail, $nickname, $pass)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
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
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "SELECT ".$db.".cliente.id from ".$db.".cliente  where   ".$db.".cliente.nickname LIKE CONCAT('%','".$nickname."','%') and   ".$db.".cliente.pass  LIKE CONCAT('%','".$pass."','%');";
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
	function insertaModelo($modelo, $year,$capPer,$ren,$cat,$foto,$precioDia)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "INSERT IGNORE INTO ".$db.".modelo  (nombre, year, capacidadPersonas, rendimiento, categoria, foto, precioDia) VALUE ('".$modelo."',".$year.",".$capPer.",".$ren.",'".$cat."','".$foto."',".$precioDia.");";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function insertaCarro($noserie, $idmodelo, $transmision,$sucursal)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "INSERT IGNORE INTO ".$db.".carro  (noSerie, modelo, status, transmision, sucursal) VALUE ('".$noserie."',".$idmodelo.",'Disponible','".$transmision."',".$sucursal.");";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function insertaSitio($pais,$ciudad,$sitio)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "call insertaLugar('".$pais."','".$ciudad."','".$sitio."');";
			$cont = $conn->query($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function insertaSucursal($nombre, $tel, $direccion, $correo,$pass)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db, $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "INSERT INTO sucursal (nombre, tel, direccion, correo, pass)  VALUE ('".$nombre."','".$tel."','".$direccion."','".$correo."','".$pass."');";
			echo($qry);
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	insertaSucursal("Aragon","57-10-70-09","Av. Hank González No. 30 Colonia Valle de Aragón 3ra Sección. Mpio Ecatepec Estado de México","aragon@rentalcar.com","superdupi");
	//insertaCarro("D3783645",3,"Manual",1);
	//insertaModelo("Pontiac Matiz",2005,4,18.5,"Compacto","matiz2005.jpg",420);
	//insertaSitio("México","Distrito Federal", "Central de Autobuses del Sur");
	//existeUsuario('alex','superdupi');
?>