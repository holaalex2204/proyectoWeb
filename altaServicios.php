<?php
	session_start();
	include("dao/funcionesBD.php");
	
	$user=null;
	$session=false;
	if(isset($_SESSION["id"])){
		$session=true;
		$user=$_SESSION["nom"];
	}
	else{
		header("Location: index.php");
	}
	include("design.php");
	drawHeader("Agregar Servicios",null,1,$user);
?>
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Ingresa los siguientes datos:</h2>
	<?php 
						if($_GET['error']==1){
							echo '<p> El noSerie ya Existe</p>';
						}
						if($_GET['error']==0){
							echo '<p> Éxito al ingresar el servicio.</p>';
						}
					?>
					<form id="form" method="post"  action="insertaServicios.php">
				<select size="1" name="sitio" required="required" ><?php echo(getPaises());?></select>
					 <label><INPUT type="hidden" name="suc" value="<?php echo($_SESSION["id"]);?>"/><br>
						<input type="submit" name="EnviarDatos" value="Aceptar" />
			</form>
        </div>           
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>