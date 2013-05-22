<?php
	include("dao/funcionesBD.php");
	session_start();
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
	drawHeader("Alta Modelo",null,1,$user);
    
?>
<!DOCTYPE html>
<html lang="en">
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
    	<div class="pad-1">
		
            <div class="page6-row1">
                
                <div class="col-16">
                    <h2 class="h2 p2">Ingresa los siguientes datos:</h2>
<?php 
						if($_GET['error']==1){
							echo '<p> No se pudo registar...</p>';
						}
						if($_GET['error']==0){
							echo '<p> Éxito al ingresar el carro.</p>';
						}
					?>
					<form id="form" method="post" action="insertaModelo.php" enctype="multipart/form-data"  >
                      <fieldset>                     
						Modelo<label><input type="text" name="modelo" required="required"></label><br>
						Capacidad de Pasajeros<label><input type="number" name="capacidad" required="required" min="2" max="8"></label><br>
						Rendimiento<label><input type="number" name="rendimiento" required="required"></label><br>
						Categoría<label><select size="1" name="cat"><br>
						<option selected="selected" required="required">-</option>
						<option>Pequeño</option>
						<option>Grande</option>
						<option>Ejecutivo</option>
						<option>CRV</option>
						<option>Premium</option>
						</select> 
						</label>
						Foto<input type="file" name="foto"/> <br>
						
					Precio por Día<label><input type="number" name="precio" required="required" ></label><br>
						<input type="submit" name="EnviarDatos" value="Aceptar" />
                        <div class="btns"><a href="#" class="link-1" onClick="document.getElementById('form').submit()">Aceptar</a></div>
                      </fieldset>  
                     
                </div>
            </div>
			</form>
        </div>           
    </section> 
<!--==============================footer=================================-->
    <footer>
        <span><strong>© 2013 ESCOM</strong><br><span>Arroyo. | Ortíz. | Cardenas </span><br/>
    </footer>	           
</body>
</html>