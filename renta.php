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
 function checaFecha()
{
	
}
</script>
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Renta de Autos:</h2>
				<form id="form" method="post" action="elegirCarro.php">
					<ul>
						<li>	<label>Fecha de Inicio</label><input type="date" name="inicio" required="required"></li>
						<li>	<label>Fecha de Entrega</label><input type="date" name="fin" required="required"></li>
						<li>	<label>Lugar de Entrega</label></li>
						<li>	<select size="1" name="sitio" required="required" ><?php echo(getPaises());?></select> </li>					
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