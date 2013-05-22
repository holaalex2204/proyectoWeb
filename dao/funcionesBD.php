<?php
	header('Content-Type: text/html; charset=UTF-8');
	$url = "localhost";
	$usuario = "root";
	$password = "root";
	$db = "rentalcar";
	function getSucursal($id)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "SELECT * from  sucursal  where  sucursal.id = ".$id.";";
			$result = $conn->query($qry)->fetch(PDO::FETCH_ASSOC);
			print_r($result);
			return result;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return 0;
		}
	}
	function getCliente($id)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$conn>exec("SET CHARACTER SET utf8");
			$qry = "SELECT * from  cliente  where  cliente.id = ".$id.";";
			$result = $conn->query($qry)->fetch(PDO::FETCH_ASSOC);
			//print_r($result);
			return result;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return 0;
		}
	}
	function sinDuplicidad($nickname)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "SELECT count(*) as c from cliente  where cliente.nickname LIKE '".$nickname."';";
			$row = $conn->query($qry)->fetch();
			$suma = $row['c'];
			$conn = null;
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "SELECT count(*) as c from sucursal  where sucursal.nombre LIKE '".$nickname."';";
			$row2 =$conn->query($qry)->fetch(); 
			$suma = $suma + $row2['c'];
			$conn = null;
			if($suma >0)
			{
				return false;
			}
			return true;
		} 
		catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		}
	}
	function insertaUsuario($nombre,  $apellidos, $tel, $direccion, $mail, $nickname, $pass)
	{
		global $url, $usuario, $password, $db;
		try {
			if(sinDuplicidad($nickname))
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
				//echo($row['id']);
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
	function precioRenta($mod,$ini, $fin) //Devuelve el precio por día al que es rentado un carro.
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "SELECT (((ABS(DATEDIFF('".$ini."','".$fin."'))+1)*precioDia) as pd from  modelo where ".$mod." = modelo.id;";
			foreach ($conn->query($qry) as $row) 
			{
				$conn = null;
        				return $row['pd'];
			}
		
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		return $cont;
	}
	function precioDia($modelo) //Devuelve el precio por día al que es rentado un carro.
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "SELECT precioDia from  modelo where ".$modelo." = modelo.id;";
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
	function datosRenta($id)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			foreach ($conn->query("select CONCAT(m.nombre,' con transmisión ', c.transmision, ' ' , 'y no. de Serie ', c.noSerie)  as carro, CONCAT(cl.nombre, ' ',cl.app) as cliente, CONCAT(DATE_FORMAT(r.ini,'%d/%m/%Y'),' al ',DATE_FORMAT(r.fin,'%d/%m/%Y')) as fecha, s.sitio, r.importe as importe from renta r, carro c, modelo m, sitio s, cliente cl where r.id_sitio = s.id and r.id_cliente = cl.id and r.noSerie = c.noSerie and c.modelo = m.id and r.id=".$id." order by r.id desc LIMIT 0,1;") as $row) 
			{
				$conn= null;
        				return $row;
			}
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return "nada";
		}
	}
	function datosUltimaRenta($cliente)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			foreach ($conn->query("select CONCAT(m.nombre,' con transmisión ', c.transmision, ' ' , 'y no. de Serie ', c.noSerie)  as carro, CONCAT(cl.nombre, ' ',cl.app) as cliente, CONCAT(DATE_FORMAT(r.ini,'%d/%m/%Y'),' al ',DATE_FORMAT(r.fin,'%d/%m/%Y')) as fecha, s.sitio , r.importe as importe from renta r, carro c, modelo m, sitio s, cliente cl where r.id_sitio = s.id and r.id_cliente = cl.id and r.noSerie = c.noSerie and c.modelo = m.id and cl.id=".$cliente." order by r.id desc LIMIT 0,1;") as $row) 
			{
				$conn= null;
        				return $row;
			}
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return "nada";
		}
	}
	function datosRentaUsuario($usuario)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			foreach ($conn->query("select CONCAT(m.nombre,' con transmisión ', c.transmision, ' ' , 'y no. de Serie ', c.noSerie)  as carro, r.id from renta r, carro c, modelo m, cliente cl where  r.id_cliente = cl.id and r.noSerie = c.noSerie and c.modelo = m.id and cl.id=".$cliente." order by r.id desc ;") as $row) 
			{
				$conn= null;
        				return $row;
			}
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
			return "nada";
		}
	}
	function insertaRentaCliente($ini,$fin,$sitio,$cliente,$modelo) // retorna el importe y el formato de la fecha de ini y fin son //aaaa-mm-dd
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "INSERT INTO renta (ini, fin, importe, id_sitio, id_cliente, noSerie,diaTransaccion)  VALUE ('".$ini."','".$fin."',((ABS(DATEDIFF('".$ini."','".$fin."'))+1)*".precioDia($modelo)."),".$sitio.",".$cliente.",(select c.noSerie from carro c where c.modelo=".$modelo." and c.noSerie NOT IN(select distinct r.noSerie from renta r where '".$fin."' BETWEEN r.ini and r.fin or '".$ini."' BETWEEN r.ini and r.fin or r.ini BETWEEN '".$ini."' and '".$fin."'  ) LIMIT 0,1),now());";
			//echo($qry);
			$cont = $conn->exec($qry);
			if($cont ==1)
			{
				foreach ($conn->query("select CONCAT(m.nombre,' con transmisión ', c.transmision, ' ' , 'y no. de Serie ', c.noSerie)  as carro, CONCAT(cl.nombre, ' ',cl.app) as cliente, CONCAT(DATE_FORMAT(r.ini,'%d/%m/%Y'),' al ',DATE_FORMAT(r.fin,'%d/%m/%Y')) as fecha, s.sitio from renta r, carro c, modelo m, sitio s, cliente cl where r.id_sitio = s.id and r.id_cliente = cl.id and r.noSerie = c.noSerie and c.modelo = m.id and cl.id=".$cliente." order by r.id desc LIMIT 0,1;") as $row) 
				{
					$conn= null;
        					return 1;
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
//			echo($qry);
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
				$texto = $texto.getCiudades($row['id']);
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
			$qry = "select distinct ciudad.id, ciudad.nombre, pais.nombre as pais from ciudad, sitio, pais where ciudad.id = sitio.ciudad and sitio.pais=".$pais." and pais.id =".$pais." order by  ciudad.nombre asc;";
			foreach ($conn->query($qry) as $row) 
			{
				$texto = $texto."<optgroup label='".$row['pais'].",  ".$row['nombre']."'>";
				$texto = $texto.getSitios($row['id']);
				$texto = $texto."</optgroup>";
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
	function getModelos()
	{
		global $url, $usuario, $password, $db;
		try {
			$texto = " ";
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "select id, nombre from modelo m order by  2 asc;";
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
	function obtenCarrosDisponibles($ini, $fin, $sitio)
	{
		global $url, $usuario, $password, $db;
		try {
			$texto = " ";
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "select distinct m.id as id ,m.nombre, m.capacidadPersonas as cp, m.rendimiento as re, m.categoria as ca, m.foto  from modelo m, carro c where  m.id = c.modelo and c.sucursal = (select id_sucursal from sitiosServicio where id_sitio=".$sitio.") and c.noSerie  NOT IN(select distinct r.noSerie from renta r where '".$fin."' BETWEEN r.ini and r.fin or '".$ini."' BETWEEN r.ini and r.fin or r.ini BETWEEN '".$ini."' and '".$fin."' ) and c.status LIKE 'Disponible'  order by m.nombre;";
			$texto = "";
			foreach ($conn->query($qry) as $row) 
			{
				$aux='<a href="recuperacliente.php?modelo='.$row['id'].'&ini='.$ini.'&fin='.$fin.'&modelo='.$row['id'].'&sitio='.$sitio.'">
				<div class="opcion">
					<div class="encabezaOpcion"><h4>'.$row['nombre'].'</h4>	</div>
					<table>
					<tr>
					<td width="350px">
					<ul>
						<li>Rendimiento: </li>
						<li>Categoria:</li>
						<li>Capacidad Personas</li>
					</ul>
					</td>
					<td width="350px">
					<ul>
						<li>'.$row['re'].'</li>
						<li>'.$row['ca'].'</li>
						<li>'.$row['cp'].'</li>
					</ul>
					</td>
					<td width="350px"><img src="'.$row['foto'].'" width="150px"></img></td>
					</table>
					<div class="encabezaOpcion"><h4>Costo : '.precioRenta($row['id'],$ini,$fin).'</h4>	</div>
				</div>
				</a>';
				$texto = $texto.$aux;
			}
			if($texto == "")
			{
				$texto = "<h3>Lo sentimos, no hay autos disponibles.<h3>";
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
			$qry = "SELECT sucursal.id  as id from sucursal  where   nombre LIKE CONCAT('%','".$nickname."','%') and   pass  LIKE CONCAT('%','".$pass."','%');";
			while ($row = $conn->query($qry)->fetch()) 
			{
				$conn = null;
        				return $row['id'];
			}
			
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return null;
		}
		return null;
		
	}
	function resumenRentas($ini, $fin)
	{
		global $url, $usuario, $password, $db;
		try {
			$conn = new PDO('mysql:host='.$url.';dbname='.$db.';charset=utf8', $usuario, $password);
			$qry = "SELECT r.ini , r.fin, r.importe, CONCAT(p.nombre,', ',ci.nombre, ': ',s.sitio ) as lugar, CONCAT(cl.nombre,' ' , cl.app) as cliente,    CONCAT(m.nombre,': ' , ca.noSerie) as auto  from renta r, pais p, ciudad ci, sitio s, cliente cl, modelo m, carro ca  where   
			r.diaTransaccion  BETWEEN  '".$ini."' and '".$fin."' and
			r.noSerie LIKE ca.noSerie and
			r.id_cliente = cl.id and
			r.id_sitio = s.id and 
			p.id = s.pais and ci.id = s.ciudad and m.id = ca.modelo order by r.diaTransaccion, lugar;";
			//echo($qry);
			$texto = "";
			foreach ($conn->query($qry) as $row) 
			{
				$aux = "
				<tr>
					<td>".$row['ini']."</td>
					<td>".$row['fin']."</td>
					<td>$".$row['importe']."</td>
					<td>".$row['lugar']."</td>
					<td>".$row['cliente']."</td>
					<td>".$row['auto']."</td>
				</tr>";
				$texto = $texto.$aux;
			}
			//echo($texto);
			$qry = "SELECT SUM(importe) as total  from renta r  where  r.diaTransaccion  BETWEEN  '".$ini."' and '".$fin."';";
			foreach ($conn->query($qry) as $row) 
			{
				$aux = "
				<tr>
					<td></td>

					<td>TOTAL:</td>
					<td>$".$row['total']."</td>
					<td></td>
					<td></td>
					<td></td>					
				</tr>";
				$texto = $texto.$aux;
			}
			return $texto;
			
			
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		}
		return $texto;
	}
	resumenRentas('2010-10-10','2013-10-10');
	//getModelos();
	//Ejemplos de como llamar las funciones:
	//hayDuplicidad('asdf');
	//getSucursal(13);
	//getCliente(4);
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
	 //insertaUsuario('alex', 'ortiz', '57107009', 'valle de tormes 174', 'holaalex2204@hotmail.com','holaalex2204', 'superdupi', '/guapo.jpg');
?>