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
	drawHeader("Alta Auto",null,1,$user);
?>
<!DOCTYPE html>
<html lang="en">

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
							echo '<p> Éxito al ingresar el carro.</p>';
						}
					?>
					<form id="form" method="post" action="insertaAuto.php">
                      <fieldset>
                        
						Número de Serie<label><input type="text" name="nserie"  maxlength="17" required="required"></label><br>


						Modelo<label><select size="1" name="modelo"><?php echo(getModelos()); 
						?>
						</select> </label><br>
						Transmisión<label><select size="1" name="transmision"><br>
						<option selected="selected" required="required">-</option>
						<option>Manual</option>
						<option>Automática</option>
						<option>CVT</option>
						<option>Tiptronic</option>
						
						</select> 
						</label>
						<label><input type="hidden" name="suc" value="<?php echo($_SESSION["id"]);?>" >
						</label>
					Año<label><input type="number" name="year" required="required" min="2009" max="2013"></label><br>
						<input type="submit" name="EnviarDatos" value="Registrarse" />
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