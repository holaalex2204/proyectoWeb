<?php
	header('Content-Type: text/html; charset=UTF-8');
	$url = "localhost";
	$usuario = "root";
	$password = "n0m3l0s3";
	$db = "rentalcar";

	function insertaUsuario($nombre,  $apellidos, $tel, $direccion, $mail, $nickname, $pass)
	{
		global $url, $usuario, $password, $db;
		try {
			
			if(existeSucursal($nickname,$pass)==0)
			{
				$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
				$conn>exec("SET CHARACTER SET utf8");
				$qry = "INSERT INTO ".$db.".cliente  (correo, nombre, app, pass, telefono, direccion, nickname) VALUE ('".$mail."','".$nombre."','".$apellidos."','".$pass."','".$tel."','".$direccion."','".$nickname."');";
				$cont = $conn->exec($qry);
				$conn = null;
			}
			else
			{
				return 0;
			}

		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		}
		return $cont;
	}	
	function existeUsuario($nickname, $pass)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "SELECT ".$db.".cliente.id from ".$db.".cliente  where   ".$db.".cliente.nickname LIKE CONCAT('%','".$nickname."','%') and   ".$db.".cliente.pass  LIKE CONCAT('%','".$pass."','%');";
			foreach ($conn->query($qry) as $row) 
			{
				$conn = null;
        				return $row['id'];
			}
			
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return 0;
		}
	}
	function insertaModelo($modelo,$capPer,$ren,$cat,$foto,$precioDia)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "INSERT IGNORE INTO ".$db.".modelo  (nombre, capacidadPersonas, rendimiento, categoria, foto, precioDia) VALUE ('".$modelo."',".$capPer.",".$ren.",'".$cat."','".$foto."',".$precioDia.");";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function insertaCarro($noserie, $idmodelo, $transmision,$sucursal,$year)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "INSERT IGNORE INTO ".$db.".carro  (noSerie, modelo, status, transmision, sucursal, year) VALUE ('".$noserie."',".$idmodelo.",'Disponible','".$transmision."',".$sucursal.",".$year.");";
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
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
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
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "INSERT INTO sucursal (nombre, tel, direccion, correo, pass)  VALUE ('".$nombre."','".$tel."','".$direccion."','".$correo."','".$pass."');";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function precioDia($noSerie) //Devuelve el precio por día al que es rentado un carro.
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "SELECT precioDia from carro, modelo where carro.noSerie LIKE '".$noSerie."' AND carro.modelo = modelo.id;";
			foreach ($conn->query($qry) as $row) 
			{
				$conn = null;
        				return $row['precioDia'];
			}
		
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function insertaRentaCliente($ini,$fin,$sitio,$cliente,$noserie) // retorna el importe y el formato de la fecha de ini y fin son //aaaa-mm-dd
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "INSERT INTO renta (ini, fin, importe, id_sitio, id_cliente, noSerie)  VALUE ('".$ini."','".$fin."',(ABS(DATEDIFF('".$ini."','".$fin."')+1)*".precioDia($noserie)."),".$sitio.",".$cliente.",'".$noserie."');";
			echo($qry);
			$cont = $conn->exec($qry);
			if($cont ==1)
			{
				foreach ($conn->query("SELECT (ABS(DATEDIFF('".$ini."','".$fin."')+1)*".precioDia($noserie).") as f") as $row) 
				{
        					$cont = $row['f'];
				}

			}
			$conn = null;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return "nada";
		}
		return $cont;
	}
	function asociaSitio($sucursal, $sitio)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "INSERT INTO sitiosServicio (id_sucursal, id_sitio)  VALUE (".$sucursal.",".$sitio.");";
			$cont = $conn->exec($qry);
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function getPaises() //devuelve países en forma de opciones para un select
	{
		global $url, $usuario, $password, $db;
		try {
			$texto = " ";
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "select * from pais order by 2 asc;";
			
			foreach ($conn->query($qry) as $row) 
			{
				$texto = $texto."<option value='".$row['id']."'>".$row['nombre']."</option>";
			}
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $texto;
	}
	function getCiudades($pais) //devuelve países en forma de opciones para un select
	{
		global $url, $usuario, $password, $db;
		try {
			$texto = " ";
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "select distinct ciudad.id, ciudad.nombre from ciudad, sitio where ciudad.id = sitio.ciudad and sitio.pais=".$pais." order by  ciudad.nombre asc;";
			foreach ($conn->query($qry) as $row) 
			{
				$texto = $texto."<option value='".$row['id']."'>".$row['nombre']."</option>";
			}
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $texto;
	}
	function getSitios($cd) //devuelve países en forma de opciones para un select
	{
		global $url, $usuario, $password, $db;
		try {
			$texto = " ";
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "select distinct sitio.id, sitio.sitio from  sitio where  sitio.ciudad=".$cd." order by  sitio.sitio asc;";
			foreach ($conn->query($qry) as $row) 
			{
				$texto = $texto."<option value='".$row['id']."'>".$row['sitio']."</option>";
			}
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $texto;
	}
	function obtenCarrosDisponibles($ini, $fin, $sitio)
	{
		global $url, $usuario, $password, $db;
		try {
			$texto = " ";
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "select m.nombre, count(*) as cantidad from modelo m, carro c where  m.id = c.modelo and c.sucursal = (select id_sucursal from sitiosServicio where id_sitio=".$sitio.") and c.noSerie  NOT IN(select distinct r.noSerie from renta r where '".$fin."' BETWEEN r.ini and r.fin or '".$ini."' BETWEEN r.ini and r.fin or r.ini BETWEEN '".$ini."' and '".$fin."' ) and c.status LIKE 'Disponible' group by m.nombre order by m.nombre;";
			foreach ($conn->query($qry) as $row) 
			{
				$texto = $texto." ".$row['nombre'].":".$row['cantidad']."<br>";
			}
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $texto;
	}
	function existeSucursal($nickname, $pass)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "SELECT sucursal.id from sucursal  where   nombre LIKE CONCAT('%','".$nickname."','%') and   pass  LIKE CONCAT('%','".$pass."','%');";
			foreach ($conn->query($qry) as $row) 
			{
        				return $row['id'];
			}
			$conn = null;
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return 0;
		}
	}
	//Ejemplos de como llamar las funciones:
	//getSitios(1);
	//getPaises();
	//asociaSitio(13,9);
	//insertaRentaCliente('2013-04-20','2013-04-20',6,1,'D3783645');
	//precioDia('D3783645');
	//insertaSucursal("Aragón","57-10-7009","Valle de Tormes 174 Col. Valle de Aragón 3ra Sección","holaalex2204@hotmail.com","superdupi");
 	//insertaCarro("D3783687",3,"Manual",1,13);
	//insertaModelo("Pontiac Matiz",2005,4,18.5,"Compacto","matiz2005.jpg",420);
	//insertaSitio("México","Distrito Federal", "Central de Autobuses del Sur");
	//existeUsuario('alex','superdupi');
	//obtenCarrosDisponibles('2010-11-11','2013-04-19',7);
?>