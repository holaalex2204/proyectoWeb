<?php
	include("dao/funcionesBD.php");
	session_start();
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	include("design.php");
	drawHeader("Galeria",null,1,$user);
?>
<body>  
<link href="css/valida.css" rel="stylesheet" type="text/css" />
<SCRIPT>
	function actualizaCiudad(str)
		{
			alert("dao/funcionesDB.php?funcion=getCiudades&idpais="+str);
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
  			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    				{
					//document.getElementById("ciudad").innerHTML = xmlhttp.responseText;
					alert(xmlhttp.responseText);
    				}
  			}
			xmlhttp.open("GET","dao/funcionesDB.php?funcion=getCiudades&idpais="+str,true);
			xmlhttp.send();
		}	
</SCRIPT>

<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Renta de Autos:</h2>
				<form id="form" method="post" action="rentaSucursal.php">
					<ul>
						<li>	<label>Fecha de Inicio</label><input type="date" name="inicio" required="required"></li>
						<li>	<label>Fecha de Entrega</label><input type="date" name="fin" required="required"></li>
						<li>	<label>Lugar de Entrega</label></li>
						<li>	<select size="1" name="pais" onload="actualizaCiudad(this.value)" onchange="actualizaCiudad(this.value)"><?php echo(getPaises());?></select> </li>
						<li>	<select size="1" name="ciudad" onchange="actualizaSitio(this.value)"></select> </li>
						<li>	<select size="1" name="sitio"></select> 					</li>						
					</ul>
					<input type="submit" value="Ver Opciones" />
                     		</form>
                </div>
            </div>
			
        </div>           
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>